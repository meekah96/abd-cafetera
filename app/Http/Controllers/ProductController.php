<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Response;

use App\Http\Requests;
use App\Product;
use App\Order;
use App\Bill;
use App\Deliver;
use App\UserDetails;
use App\ProductOrder;

use Sentinel;
use Mail;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth', ['except' => ['get_product_image', 'get_product_by_id', 'post_order', 'send_mail']]);
        $this->AuthUser = Auth()->user();
       // $this->AuthUser = Sentinel::getUser(); 
    }

    public function index(Request $request)
    {
        if(isset($request->type) && $request->type == 'json')
        {
            $products = Product::get();

            return response()->json([ 'data' => $products]);
        }
        
        return view('admin.product.index');
    }

    public function edit(Request $request)
    {

        $product = Product::find($request->id);
        

        return view('admin.product.edit',compact('product'));
    }

    public function store(Request $request)
    {
        $product = Product::create([
            'type' => $request->type,
            'title' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'image' => '',
            'description' => $request->description

        ]);

        $pic_name = $this->upload_product_image($request->picture, $product->id);
        $product->image = $pic_name;
        $product->save();
        
        return response()->json(true);

    }

    public function update(Request $request)
    {   
        $pic_name = '';
        $product = Product::find($request->id);
        if(isset($request->picture) && $request->picture != '' )
        {
            unlink(storage_path() . '/documents/product/'.$request->id.'/' . $product->image);
            $pic_name = $this->upload_product_image($request->picture, $request->id);
        }

        $product->type = $request->type;
        $product->title = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        ($pic_name != '' ? $product->image = $pic_name : '');
        $product->description = $request->description;
        $product->save();

        
        return response()->json(true);

    }

    public function upload_product_image($image,$id)
    {
        $name = $image->getClientOriginalName();
        $time = time(); //random number generator;
        $file_name = $time . $name;
        $image->move(storage_path() . '/documents/product/'. $id. '/', $file_name);

        return $file_name;
    }

    public function get_product_image(Request $request)
    {


        $path = storage_path() . '/documents/product/'.$request->product_id.'/' . $request->file_name;
        
        
        if(!File::exists($path)) abort(404);

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
       
        return $response;
    }

    public function get_product_by_id(Request $request)
    {

        $product = Product::find($request->id);
        return response()->json( $product );
        
    }

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        unlink(storage_path() . '/documents/product/'.$request->id.'/' . $product->image);
       
        Product::find($request->id)->delete();
        return redirect('/admin/product/get-product');
    }

    public function send_mail(Request $request)
    {
        $subject = 'test email';
        $content = 'hi,<br> This is a dummy content';

        Mail::send('email.index', ['body' => $content], function ($m) use ($subject) {
            $m->from('abc-cafeterita@gmail.com', ('Contact Mail'));
           $m->to('mr.meekah96@gmail.com')->subject($subject);
        });
    }


    public function post_order(Request $request)
    {

       
        // Get the last order id
        $lastorderId = Order::orderBy('id', 'desc')->first()->reference_no;
        // Get last 4 digits of last order id
        $lastIncreament = substr($lastorderId, -4);
        $lastIncreament++;
        $order_ref_no = 'ORD'. str_pad($lastIncreament,4,'0',STR_PAD_LEFT);

        if($request->customer_type != 1 )
        {
            $customer = UserDetails::create([
                'user_id' => 0,
                'type' => 2,
                'first_name' => $request->fname,
                'last_name' => $request->lname,
                'address' => $request->address,
                'city' => $request->inputCity,
                'state' => $request->inputState,
                'zip' => $request->inputZip,
                'email' => $request->inputEmail,
            ]);
        }

        $Order = Order::create([
            'type' =>$request->pick_type,
            'order_by' => ($request->customer_type == 1 ? $this->AuthUser->id : $customer->id),
            'reference_no' => $order_ref_no,
            'venue' =>$request->inputCity,
            'status' =>0,
            'pick_time' => date("Y-m-d"),
        ]);

        $product_id = array();
        $quantity_id = array();
        $both = explode(',', $request->product_order);
        foreach ($both as $k => $v) {
            if ($k % 2 == 0) {
                $product_id[] = $v;
            }
            else {
                $quantity_id[] = $v;
            }
        }


        foreach($quantity_id as $key=>$item)
        {
            
            ProductOrder::create([
                'product_id' => $product_id[$key],
                'order_id' => $Order->id,
                'quantity' => $item
            ]);
        }

        

        if($request->pick_type == 2 )
        {
            $deliver = Deliver::create([
                'order_id' => $Order->id,
                'charge' => 60,
                'distance' => 30,
                'deliverd_by' => 0
            ]);
        }

         // Get the last order id
         $lastBillId = Bill::orderBy('id', 'desc')->first()->reference_no;
         // Get last 4 digits of last order id
         $lastIncreament = substr($lastBillId, -4);
         $lastIncreament++;
         $bill_ref_no = 'BILL'. str_pad($lastIncreament,4,'0',STR_PAD_LEFT);

        $bill = Bill::create([
            'order_id' => $Order->id,
            'bill_type' =>  $request->payment_method,
            'reference_no' => $bill_ref_no,
            'total_price' => $request->total,
            'paid' => $request->total,
            'balance' => 0
        ]);

        $subject = 'Order Confirmation';
        $content = 'Hello, <br>
        Thank you for your order! A record of your purchase information appears below.<br>
        Please keep this email as the confirmation of your order’s payment.<br>
        <br>
        <strong>Order Information</strong><br>
        <ol>
            <li> Bill Number : '.$bill_ref_no.'</li> 
            <li> Confirmation Number : '.$order_ref_no.'</li> 
        </ol>
        If you have questions about this order, you can simply reply to this email with your questions and we
        will get back to you shortly with an answer.<br>
        Thanks again for your purchasing! We appreciate that you’ve chosen us.<br>
        <br>  
        Thanks,<br>
        <strong>ABC Cafeteria Team</strong>';

        Mail::send('email.index', ['body' => $content], function ($m) use ($subject, $request) {
            $m->from('abc-cafeterita@gmail.com', ('Contact Mail'));
           $m->to($request->inputEmail)->subject($subject);
        });

        return response()->json('success');
        
    }

    
}
