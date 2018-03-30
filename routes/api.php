<?php

use Illuminate\Http\Request;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

    Route::prefix('customers')->group(function (){
        Route::get('', 'CustomerController@index');
        Route::get('/{id}', 'CustomerController@show');
        Route::post('', 'CustomerController@store');
        Route::put('/{id}', 'CustomerController@update');
        Route::delete('/{id}', 'CustomerController@destroy');
    });

    Route::prefix('products')->group(function (){
        Route::get('', 'ProductController@index');
        Route::get('/{id}', 'ProductController@show');
        Route::post('', 'ProductController@store');
        Route::put('/{id}', 'ProductController@update');
        Route::delete('/{id}', 'ProductController@destroy');
    });

    Route::prefix('orders')->group(function (){
        Route::get('', 'OrderController@index');
        Route::get('/{id}', 'OrderController@show');
        Route::post('', 'OrderController@store');
        Route::put('/{id}', 'OrderController@update');
        Route::delete('/{id}', 'OrderController@destroy');
    });