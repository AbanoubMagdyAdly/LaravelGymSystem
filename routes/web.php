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

Route::prefix('admin')->middleware('auth')->group(function() {

    Route::get('', 'HomeController@admin')->name('admin');
    Route::get('/data', 'HomeController@data')->name('data');
    Route::get('/buypackage', 'HomeController@show')->name('plans.index');
    Route::post('/buypackage', 'HomeController@buy')->name('plans.show');
});
Route::prefix('citymanager')->middleware('auth')->group(function(){
    Route::get('/dataAjax', 'CityManagerController@index')->name('CityManager.index');
    Route::get('/data', 'CityManagerController@index_view')->name('CityManager.index_view');
    Route::get('/create', 'CityManagerController@create')->name('CityManager.create');
    Route::post('/data', 'CityManagerController@store')->name('CityManager.store');
    Route::get('/{id}/edit', 'CityManagerController@edit')->name('CityManager.edit');
    Route::put('/{id}', 'CityManagerController@update')->name('CityManager.update');
    Route::get('/show/{id}', 'CityMangerController@show')->name('CityManager.show');
    Route::get('/citymanager/{id}', 'CityMangerController@destroy')->name('CityManager.destroy');


});

Route::prefix('gymmanager')->middleware('auth')->group(function(){
    Route::get('/dataAjax', 'GymManagerController@index')->name('GymManager.index');
    Route::get('/data', 'GymManagerController@index_view')->name('GymManager.index_view');
    Route::get('/show/{id}', 'GymManagerController@show')->name('GymManager.show');
    Route::get('/{id}', 'GymMangerController@destroy')->name('GymManager.destroy');
    Route::get('/create', 'GymManagerController@create')->name('GymManager.create');
    Route::post('/data', 'GymManagerController@store')->name('GymManager.store');
    Route::get('/{id}/edit', 'GymManagerController@edit')->name('GymManager.edit');
    Route::put('/{id}', 'GymManagerController@update')->name('GymManager.update');

});
Route::prefix('gyms')->middleware('auth')->group(function(){

    Route::get('/dataAjax', 'GymController@index')->name('Gym.index');
    Route::get('/data', 'GymController@index_view')->name('Gym.index_view');
    Route::get('/create', 'GymController@create')->name('Gym.create');
    Route::post('/data', 'GymController@store')->name('Gym.store');
    Route::get('/show/{id}', 'GymController@show')->name('Gym.show');
    Route::get('/{id}/edit', 'GymController@edit')->name('Gym.edit');
    Route::put('/{id}', 'GymController@update')->name('Gym.update');
});


Route::prefix('trainingpackages')->middleware('auth')->group(function() {

    Route::get('/dataAjax', 'TrainingPackagesController@index')->name('TrainingPackagesController.index');
    Route::get('/all', 'TrainingPackagesController@index_view')->name('TrainingPackagesController.index_view');
    Route::get('/create', 'TrainingPackagesController@create')->name('TrainingPackagesControlle.create');
    Route::post('', 'TrainingPackagesController@store')->name('TrainingPackagesControlle.store');
    Route::get('/{id}/edit', 'TrainingPackagesController@edit')->name('TrainingPackagesController.edit');
    Route::put('/{id}', 'TrainingPackagesController@update')->name('TrainingPackagesController.update');
    Route::get('/{id}', 'TrainingPackagesController@destroy')->name('TrainingPackagesController.destroy');
});


