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

Route::middleware('auth:api')->get('/trainee', function (Request $request) {
    return $request->us;
});
Route::get('/trainees', 'Api\TraineeController@index')->name('trainee.index');
Route::get('/trainees/{trainee}','Api\TraineeController@show')->name('trainee.show');
Route::post('/trainees','Api\TraineeController@store')->name('trainee.store');
Route::DELETE('/trainees/{trainee}','Api\TraineeController@destroy')->name('trainee.destroy');
// Route::get('/trainees/{trainee}/edit','Api\TraineeController@edit')->name('trainee.edit');//->middleware('auth:api');

Route::PUT('/trainees/{trainee}','Api\TraineeController@update')->name('trainee.update');//->middleware('auth:api');
// Route::PUT('/trainees/{trainee}',function()
// {
//     dd("ss");
// });
