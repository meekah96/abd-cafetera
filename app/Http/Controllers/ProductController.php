<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use File;
use Response;

use App\Http\Requests;
use App\Product;
use Sentinel;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function delete(Request $request)
    {
        $product = Product::find($request->id);
        unlink(storage_path() . '/documents/product/'.$request->id.'/' . $product->image);
       
        Product::find($request->id)->delete();
        return redirect('/admin/product/get-product');
    }
}
