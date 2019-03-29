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
// */    


Route::post('login', 'ApiController@login');//->middleware('verified');
Route::post('register', 'ApiController@register');
Route::get('/user/verify/{token}', 'ApiController@verifyUser');

Route::group(['middleware' => 'auth:api'], function () {
    Route::put('/me/update', 'ApiController@update');
    Route::get('/me/logout', 'ApiController@logout');
    Route::post('me/create/{id}', 'Api\TraineeController@create');
    Route::get('/me/show' ,'Api\TraineeController@show');
    Route::get('/me/show/history' ,'Api\TraineeController@showHistory');

});

Route::group(['middleware' => 'auth:api'], function () {
    	    Route::put('trainees/update', 'ApiController@update');
    	    Route::get('logout', 'ApiController@logout');

});