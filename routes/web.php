<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/admin/data', 'HomeController@data')->name('data');

Route::get('/citymanager/dataAjax', 'CityManagerController@index')->name('CityManager.index');
Route::get('/citymanager/data', 'CityManagerController@index_view')->name('CityManager.index_view');
Route::get('/citymanager/create', 'CityManagerController@create')->name('CityManager.create');
Route::post('/citymanager/data', 'CityManagerController@store')->name('CityManager.store');
Route::get('/citymanager/{id}/edit', 'CityManagerController@edit')->name('CityManager.edit');
Route::put('/citymanager/{id}', 'CityManagerController@update')->name('CityManager.update');


Route::get('/gymmanager/dataAjax', 'GymManagerController@index')->name('GymManager.index');
Route::get('/gymmanager/data', 'GymManagerController@index_view')->name('GymManager.index_view');
Route::get('/gymmanager/show/{id}', 'GymManagerController@show')->name('GymManager.show');
Route::get('/Gymmanager/{id}', 'GymMangerController@destroy')->name('GymManager.destroy');
Route::get('/citymanager/show/{id}', 'CityMangerController@show')->name('CityManager.show');

Route::get('/admin/buypackage', 'HomeController@show')->name('plans.index');
Route::post('/admin/buypackage', 'HomeController@buy')->name('plans.show');
Route::get('/citymanager/{id}', 'CityMangerController@destroy')->name('CityManager.destroy');

Route::get('/attendance/dataAjax', 'AttendanceUserController@index')->name('Attendance.index');
Route::get('/attendance/data', 'AttendanceUserController@index_view')->name('Attendance.index_view');
