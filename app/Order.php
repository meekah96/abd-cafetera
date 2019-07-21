<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Order extends Model
{
    protected $table = 'order_master';
    
    protected $fillable = [
        'type','order_by', 'reference_no', 'venue', 'status', 'updated_by' , 'preparation_time', 'pick_time'
    ];


    public function products()
    {
        $products = Product::join('product_order', 'product_order.product_id', '=', 'product_master.id')
                            ->where('product_order.order_id', '=', $this->id)->get();

        return $products;
    }
}
