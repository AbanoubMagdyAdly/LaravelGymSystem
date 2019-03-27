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
*/    Route::put('trainees/update', 'ApiController@update');

Route::post('login', 'ApiController@login');//->middleware('verified');
	Route::post('register', 'ApiController@register');
	Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('logout', 'ApiController@logout');
    Route::get('user', 'ApiController@getAuthUser');
});

// Route::group(['middleware' => 'auth:api'], function () {
//     	    Route::put('trainees/update', 'ApiController@update');
// 	});

// Route::PUT('/trainees/{trainee}',function()
// {
//     dd("ss");
// });

