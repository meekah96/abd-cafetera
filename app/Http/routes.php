<?php
use App\Product;
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

    $products = Product::all();
    return view('welcome', compact('products'));
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/show/cart', function()
{
    return view('admin.product.cart');
});


Route::post('/general/post-order', 'ProductController@post_order');
Route::get('/general/send-email', 'ProductController@send_mail');


Route::group(['middleware' => ['web']], function () {

    Route::get('/admin/product/get-product', 'ProductController@index');
    Route::get('/admin/product/edit', 'ProductController@edit');
    Route::post('/admin/product/update', 'ProductController@update');
    Route::get('/admin/product/create', function()
    {
        return view('admin.product.create');
    });
    Route::post('/admin/product/store', 'ProductController@store');
    Route::get('/admin/product/delete', 'ProductController@delete');
    Route::get('/admin/product/view-image/{product_id}/{file_name}', 'ProductController@get_product_image');
    Route::get('/admin/product/get-product-by-id', 'ProductController@get_product_by_id');
    
    Route::get('/admin/order/view', 'UserController@view_admin_orders');
    

    Route::get('/user/profile/view', 'UserController@view_profile');

    //customer
    Route::get('/customer/product/view', 'UserController@view_my_purcases');
    Route::get('/customer/product/cancel', 'UserController@cancel_purchase');

    //chef
    Route::get('/chef/product/view', 'UserController@view_cheff_orders');
    Route::get('/chef/order/preperation', 'UserController@change_status');

    //deliver-boy
    Route::get('/deliver-boy/product/view', 'UserController@view_deliver_orders');
    Route::get('/deliver-boy/my-product/view', 'UserController@view_my_deliver_orders');

    //receiptent
    Route::get('/receiptent/product/view', 'UserController@view_ready_orders');
    
    

});









