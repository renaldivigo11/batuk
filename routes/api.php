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

Route::post('register','Api\Auth\AuthController@register');
Route::post('login','Api\Auth\AuthController@login');

Route::group(['prefix'=> 'batuk'], function(){
    Route::group(['middleware'=> 'auth:api'], function(){
        Route::get('get_all', 'Api\Batuk\BatukController@getAll');
        Route::post('tambah', 'Api\Batuk\BatukController@store');
        Route::post('update', 'Api\Batuk\BatukController@update');
        Route::post('delete', 'Api\Batuk\BatukController@destroy');
    });
});
