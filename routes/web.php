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

Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('', 'HomeController@admin')->name('admin');
    Route::get('/data', 'HomeController@data')->name('data');
    Route::get('/buypackage', 'HomeController@show')->name('plans.index');
    Route::post('/buypackage', 'HomeController@buy')->name('plans.show');
});
Route::prefix('citymanager')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'CityManagerController@index')->name('CityManager.index');
    Route::get('/data', 'CityManagerController@index_view')->name('CityManager.index_view');
    Route::get('/create', 'CityManagerController@create')->name('CityManager.create');
    Route::post('/data', 'CityManagerController@store')->name('CityManager.store');
    Route::get('/{id}/edit', 'CityManagerController@edit')->name('CityManager.edit');
    Route::put('/{id}', 'CityManagerController@update')->name('CityManager.update');
    Route::get('/show/{id}', 'CityManagerController@show')->name('CityManager.show');
    Route::get('/ban/{id}', 'CityManagerController@ban')->name('CityManager.ban');
    Route::get('/unban/{id}', 'CityManagerController@unban')->name('CityManager.unban');
    Route::get('/{id}', 'CityManagerController@destroy')->name('CityManager.destroy');
});

Route::prefix('gymmanager')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'GymManagerController@index')->name('GymManager.index');
    Route::get('/data', 'GymManagerController@index_view')->name('GymManager.index_view');
    Route::get('/show/{id}', 'GymManagerController@show')->name('GymManager.show');
    Route::get('/create', 'GymManagerController@create')->name('GymManager.create');
    Route::post('/data', 'GymManagerController@store')->name('GymManager.store');
    Route::get('/{id}/edit', 'GymManagerController@edit')->name('GymManager.edit');
    Route::get('/{id}', 'GymManagerController@destroy')->name('GymManager.destroy');
    Route::put('/{id}', 'GymManagerController@update')->name('GymManager.update');
    Route::get('/ban/{id}', 'GymManagerController@ban')->name('GymManager.ban');
    Route::get('/unban/{id}', 'GymManagerController@unban')->name('GymManager.unban'); 
});

Route::prefix('gyms')->middleware('auth')->group(function () {

    Route::get('/dataAjax', 'GymController@index')->name('Gym.index');
    Route::get('/data', 'GymController@index_view')->name('Gym.index_view');
    Route::get('/create', 'GymController@create')->name('Gym.create');
    Route::post('/data', 'GymController@store')->name('Gym.store');
    Route::get('/show/{id}', 'GymController@show')->name('Gym.show');
    Route::get('/{id}/edit', 'GymController@edit')->name('Gym.edit');
    Route::put('/{id}', 'GymController@update')->name('Gym.update');
});


Route::prefix('trainingpackages')->middleware('auth')->group(function () {

    Route::get('/dataAjax', 'TrainingPackagesController@index')->name('TrainingPackagesController.index');
    Route::get('/all', 'TrainingPackagesController@index_view')->name('TrainingPackagesController.index_view');
    Route::get('/show/{id}', 'TrainingPackagesController@show')->name('TrainingPackagesController.show');
    
    Route::get('/create', 'TrainingPackagesController@create')->name('TrainingPackagesController.create');
    Route::post('', 'TrainingPackagesController@store')->name('TrainingPackagesController.store');
    Route::get('/{id}/edit', 'TrainingPackagesController@edit')->name('TrainingPackagesController.edit');
    Route::put('/{id}', 'TrainingPackagesController@update')->name('TrainingPackagesController.update');
    Route::get('/{id}', 'TrainingPackagesController@destroy')->name('TrainingPackagesController.destroy');
});



Route::get('/attendance/dataAjax', 'AttendanceUserController@index')->name('Attendance.index');
Route::get('/attendance/data', 'AttendanceUserController@index_view')->name('Attendance.index_view');


Route::prefix('trainees')->middleware('auth')->group(function() {

    Route::get('/dataAjax', 'TraineesController@index')->name('TraineesController.index');
    Route::get('/all', 'TraineesController@index_view')->name('TraineesController.index_view');
    Route::get('/{id}', 'TraineesController@destroy')->name('TraineesController.destroy');
    Route::get('/{id}/edit', 'TraineesController@edit')->name('TraineesController.edit');
    Route::put('/{id}', 'TraineesController@update')->name('TraineesController.update');



});
Route::prefix('trainingsession')->middleware('auth')->group(function () {

    Route::get('/dataAjax', 'TrainingSessionController@index')->name('TrainingSession.index');
    Route::get('/all', 'TrainingSessionController@index_view')->name('TrainingSession.index_view');
    Route::get('/create', 'TrainingSessionController@create')->name('TrainingSession.create');
    Route::post('', 'TrainingSessionController@store')->name('TrainingSession.store');
    Route::get('/{id}/edit', 'TrainingSessionController@edit')->name('TrainingSession.edit');
    Route::put('/{id}', 'TrainingSessionController@update')->name('TrainingSession.update');
    Route::get('show/{id}', 'TrainingSessionController@show')->name('TrainingSession.show');
    Route::get('/{id}', 'TrainingSessionController@destroy')->name('TrainingSession.destroy');
});



Route::prefix('coaches')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'CoachesController@index')->name('Coaches.index');
    Route::get('/data', 'CoachesController@index_view')->name('Coaches.index_view');
    Route::get('/create', 'CoachesController@create')->name('Coaches.create');
    Route::post('/data', 'CoachesController@store')->name('Coaches.store');
    Route::get('/{id}/edit', 'CoachesController@edit')->name('Coaches.edit');
    Route::put('/{id}', 'CoachesController@update')->name('Coaches.update');
    Route::get('/show/{id}', 'CoachesController@show')->name('Coaches.show');
    // Route::get('/ban/{id}', 'CoachesController@ban')->name('Coaches.ban');
    // Route::get('/unban/{id}', 'CoachesController@unban')->name('Coaches.unban');
    Route::get('/{id}', 'CoachesController@destroy')->name('Coaches.destroy');
});


Route::prefix('revenue')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'RevenueController@index')->name('revenue.index');
    Route::get('/data', 'RevenueController@index_view')->name('revenue.index_view');
    Route::get('/create', 'RevenueController@create')->name('revenue.create');
    Route::post('/data', 'RevenueController@store')->name('revenue.store');
    Route::get('/{id}/edit', 'RevenueController@edit')->name('revenue.edit');
    Route::put('/{id}', 'RevenueController@update')->name('revenue.update');
    Route::get('/show/{id}', 'RevenueController@show')->name('revenue.show');
    // Route::get('/ban/{id}', 'RevenueController@ban')->name('revenue.ban');
    // Route::get('/unban/{id}', 'RevenueController@unban')->name('revenue.unban');
    Route::get('/{id}', 'RevenueController@destroy')->name('revenue.destroy');
});