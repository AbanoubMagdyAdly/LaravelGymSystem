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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->us;
});
Route::get('/users', 'Api\UsersController@index')->name('user.index');
Route::get('/users/{user}','Api\UsersController@show')->name('user.show');
Route::post('/users','Api\UsersController@store')->name('user.store');
Route::DELETE('/users/{user}','Api\UsersController@destroy')->name('user.destroy');