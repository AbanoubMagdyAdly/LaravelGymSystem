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

Route::get('/admin/buypackage', 'HomeController@show')->name('plans.index');
Route::post('/admin/buypackage', 'HomeController@buy')->name('plans.show');
