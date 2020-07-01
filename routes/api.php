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
 

Route::get('pizzas', 'PizzaController@index');
Route::get('pizzas/{pizza}', 'PizzaController@show');
Route::post('pizzas', 'PizzaController@store');
Route::put('pizzas/{pizza}', 'PizzaController@update');
Route::delete('pizzas/{pizza}', 'PizzaController@delete');