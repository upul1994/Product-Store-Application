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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("add","ItemsController@addProduct");

Route::get("/get","ItemsController@getProduct");

Route::delete("/delete/{id}","ItemsController@deleteProduct");

Route::put("edit/{id}","ItemsController@editProduct");

Route::get("/show/{id}","ItemsController@getProductById");
