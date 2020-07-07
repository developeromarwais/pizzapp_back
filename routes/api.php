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
 
Route::post('register', 'Auth\RegisterController@register');

Route::post('login', 'Auth\LoginController@login');
Route::middleware('auth:api')->post('logout', 'Auth\LoginController@logout');

Route::get('pizzas', 'PizzaController@index');
Route::get('pizzas/{pizza}', 'PizzaController@show');
Route::post('pizzas', 'PizzaController@store');
Route::put('pizzas/{pizza}', 'PizzaController@update');
Route::delete('pizzas/{pizza}', 'PizzaController@delete');

Route::get('carts', 'CartController@index');
Route::get('carts/{cart}', 'CartController@show');
Route::get('carts/getCartDetails/{cart}', 'CartController@getCartDetails');
Route::post('carts', 'CartController@store');
Route::put('carts/{cart}', 'CartController@update');
Route::delete('carts/{cart}', 'CartController@delete');

Route::get('cart_details', 'Cart_detailController@index');
Route::get('cart_details/{cart_detail}', 'Cart_detailController@show');
Route::post('cart_details', 'Cart_detailController@store');
Route::put('cart_details/{cart_detail}', 'Cart_detailController@update');
Route::delete('cart_details/{cart_detail}', 'Cart_detailController@delete');


Route::post('orders', 'OrderController@store');
Route::middleware('auth:api')->get('userorders', 'OrderController@getUserOrders');
Route::middleware('auth:api')->get('orderdetails/{order}', 'OrderController@getOrderDetails');
