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
Route::get('/citymanager/show/{id}', 'CityMangerController@show')->name('CityManager.show');


Route::get('/gymmanager/dataAjax', 'GymManagerController@index')->name('GymManager.index');
Route::get('/gymmanager/data', 'GymManagerController@index_view')->name('GymManager.index_view');
Route::get('/gymmanager/show/{id}', 'GymManagerController@show')->name('GymManager.show');
Route::get('/Gymmanager/{id}', 'GymMangerController@destroy')->name('GymManager.destroy');
Route::get('/gymmanager/create', 'GymManagerController@create')->name('GymManager.create');
Route::post('/gymmanager/data', 'GymManagerController@store')->name('GymManager.store');
Route::get('/gymmanager/{id}/edit', 'GymManagerController@edit')->name('GymManager.edit');
Route::put('/gymmanager/{id}', 'GymManagerController@update')->name('GymManager.update');






Route::get('/admin/buypackage', 'HomeController@show')->name('plans.index');
Route::post('/admin/buypackage', 'HomeController@buy')->name('plans.show');


Route::get('/trainingpackages/dataAjax', 'TrainingPackagesController@index')->name('TrainingPackagesController.index');
Route::get('/trainingpackages/all', 'TrainingPackagesController@index_view')->name('TrainingPackagesController.index_view');
Route::get('/trainingpackages/create', 'TrainingPackagesController@create')->name('TrainingPackagesControlle.create');
Route::post('/trainingpackages', 'TrainingPackagesController@store')->name('TrainingPackagesControlle.store');
Route::get('/trainingpackages/{id}/edit', 'TrainingPackagesController@edit')->name('TrainingPackagesController.edit');
Route::put('/trainingpackages/{id}', 'TrainingPackagesController@update')->name('TrainingPackagesController.update');
Route::delete('/trainingpackages/{id}', 'TrainingPackagesController@destroy')->name('TrainingPackagesController.destroy');

// Route::get('/trainingpackages/create', function()
// {
//     return "eman";
// });

// Route::post('/trainingpackage/data', 'TrainingPackagesController@store')->name('TrainingPackagesController.store');


Route::get('/citymanager/{id}', 'CityMangerController@destroy')->name('CityManager.destroy');
