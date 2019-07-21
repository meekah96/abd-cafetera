<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'billing_master';
    
    protected $fillable = [
        'order_id', 'bill_type', 'reference_no', 'total_price', 'paid', 'balance'
    ];
}
