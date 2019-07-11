<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Sentinel;
use App\Http\Requests;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
       //$this->AuthUser = Sentinel::getUser(); 
    }

    public function view_profile(Request $request)
    {
        return view('user.profile');
    }
}
