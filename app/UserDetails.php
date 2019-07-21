<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    Protected $table = 'customer_master';
    
    protected $fillable = [
        'user_id', 'type', 'first_name',
        'last_name',
        'address',
        'city',
        'state',
        'zip',
        'contact_no',
        'email'
    ];
}
