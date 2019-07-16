<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    protected $table = 'delivery_master';
    
    protected $fillable = [
        'order_id', 'charge', 'distance', 'deliverd_by'
    ];
}
