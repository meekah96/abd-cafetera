<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductOrder extends Model
{
    protected $table = 'product_order';

    public $timestamps = false;
    
    protected $fillable = [
        'product_id', 'order_id', 'quantity'
    ];
}
