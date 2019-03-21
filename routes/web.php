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
Route::get('/citymanager/dataAjax', 'CityMangerController@index')->name('CityManager.index');
Route::get('/citymanager/data', 'CityMangerController@index_view')->name('CityManager.index_view');
