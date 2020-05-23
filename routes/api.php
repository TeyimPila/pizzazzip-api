<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('users', 'UserController');
Route::apiResource('orders', 'OrderController');
Route::apiResource('products', 'ProductController');

Route::get('products/{product}/options', 'ProductOptionController@index');
Route::post('products/{product}/options', 'ProductOptionController@store');
Route::put('products/{product}/options/{option}', 'ProductOptionController@update');
Route::delete('products/{product}/options/{option}', 'ProductOptionController@destroy');

Route::get('products/{product}/ingredients', 'ProductIngredientController@index');
Route::post('products/{product}/ingredients', 'ProductIngredientController@store');
Route::put('products/{product}/ingredients/{ingredient}', 'ProductIngredientController@update');
Route::delete('products/{product}/ingredients/{ingredient}', 'ProductIngredientController@destroy');

Route::get('orders/{order}/items', 'OrderItemController@index');
Route::post('orders/{order}/items', 'OrderItemController@store');
Route::put('orders/{order}/items/{item}', 'OrderItemController@update');
Route::delete('orders/{order}/items/{item}', 'OrderItemController@destroy');

Route::get('users/{user}/addresses', 'OrderItemController@index');
Route::post('users/{user}/addresses', 'OrderItemController@store');
Route::put('users/{user}/addresses/{address}', 'OrderItemController@update');
Route::delete('addresses/{address}', 'OrderItemController@destroy');
Route::get('addresses/{address}', 'OrderItemController@show');
