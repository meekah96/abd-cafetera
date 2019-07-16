<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Role;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    function inRole($role_slug)
    {
        $role = User::join('roles_master', 'roles_master.id', '=', 'users.role_id')
                    ->where('users.id', '=', $this->id)->pluck('roles_master.slug')->first();

        if($role_slug == $role) return true;
        else return false;
    }
}
