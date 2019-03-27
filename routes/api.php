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

Route::post('login', 'ApiController@login');
//->middleware('verified');
	Route::post('register', 'ApiController@register');

	Route::group(['middleware' => 'auth.jwt'], function () {
<<<<<<< HEAD

    Route::get('logout', 'ApiController@logout');
    Route::get('user', 'ApiController@getAuthUser');
});

// Route::group(['middleware' => 'auth:api'], function () {
//     	    Route::put('trainees/update', 'ApiController@update');
// 	});

// Route::PUT('/trainees/{trainees}',function()
// {
//     dd("ss");
// });
=======
    // Route::get('logout', 'ApiController@logout');
    // Route::put('trainees/update', 'ApiController@update');

    Route::get('user', 'ApiController@getAuthUser');
});

Route::group(['middleware' => 'auth:api'], function () {
    	    Route::put('trainees/update', 'ApiController@update');
    	        Route::get('logout', 'ApiController@logout');
>>>>>>> 81ff8fa9d1297b0a29f1da8e5bf1e1a55501c3ac

	});
