<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/admin/categoery/get-category', 'CategoryController@index');
Route::get('/admin/categoery/edit', 'CategoryController@edit');
Route::post('/admin/categoery/update', 'CategoryController@update');
Route::get('/admin/categoery/create', function()
{
    return view('admin.cateogry.create');
});
Route::post('/admin/categoery/store', 'CategoryController@store');
Route::get('/admin/categoery/delete', 'CategoryController@delete');

Route::get('/user/profile/view', 'UserController@view_profile');







