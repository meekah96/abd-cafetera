<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product_master';
    
    protected $fillable = [
        'type', 'title', 'price', 'quantity', 'description'
    ];
}
