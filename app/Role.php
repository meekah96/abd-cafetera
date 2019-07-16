<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles_master';
    
    protected $fillable = [
        'name', 'slug', 'rank'
    ];
}
