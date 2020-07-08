<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Pizza;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//register
Route::post('register', 'Auth\RegisterController@register'); 
//login
Route::post('login', 'Auth\LoginController@login');


// Pizza Module, View/Create/Update/Delete
Route::get('pizzas', 'PizzaController@index');
Route::get('pizzas/{pizza}', 'PizzaController@show');
Route::post('pizzas', 'PizzaController@store');
Route::put('pizzas/{pizza}', 'PizzaController@update');
Route::delete('pizzas/{pizza}', 'PizzaController@delete');

// Cart Module, View/Create/Update/Delete/
Route::get('carts', 'CartController@index');
Route::get('carts/{cart}', 'CartController@show');
Route::post('carts', 'CartController@store');
Route::put('carts/{cart}', 'CartController@update');
Route::delete('carts/{cart}', 'CartController@delete');
//getCartDetails for getting the cart items for a spicfic cart
Route::get('carts/getCartDetails/{cart}', 'CartController@getCartDetails');

// Cart Details Module, View/Create/Update/Delete/
Route::get('cart_details', 'Cart_detailController@index');
Route::get('cart_details/{cart_detail}', 'Cart_detailController@show');
Route::post('cart_details', 'Cart_detailController@store');
Route::put('cart_details/{cart_detail}', 'Cart_detailController@update');
Route::delete('cart_details/{cart_detail}', 'Cart_detailController@delete');

// Order Module, Insert Order
Route::post('orders', 'OrderController@store');



// Authenticated routes that can only be used with Bearer Authentication 

// Getting the order history for a registered user
Route::middleware('auth:api')->get('userorders', 'OrderController@getUserOrders');
// Getting the order details for a registered user
Route::middleware('auth:api')->get('orderdetails/{order}', 'OrderController@getOrderDetails');
// User logging out
Route::middleware('auth:api')->post('logout', 'Auth\LoginController@logout');
