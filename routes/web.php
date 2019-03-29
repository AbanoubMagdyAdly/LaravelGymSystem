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
    Route::get('/buypackage', 'HomeController@show')->name('plans.index')->middleware('permission:buy_sessions_to_users');
    Route::post('/buypackage', 'HomeController@buy')->name('plans.show')->middleware('permission:buy_sessions_to_users');
});
Route::prefix('citymanager')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'CityManagerController@index')->name('CityManager.index')->middleware('permission:CRUD_city_managers');
    Route::get('/data', 'CityManagerController@index_view')->name('CityManager.index_view')->middleware('permission:CRUD_city_managers');
    Route::post('/data', 'CityManagerController@store')->name('CityManager.store')->middleware('permission:CRUD_city_managers');
    Route::get('/create', 'CityManagerController@create')->name('CityManager.create')->middleware('permission:CRUD_city_managers');

    Route::get('/{id}/edit', 'CityManagerController@edit')->name('CityManager.edit')->middleware('permission:CRUD_city_managers');
    Route::put('/{id}', 'CityManagerController@update')->name('CityManager.update')->middleware('permission:CRUD_city_managers');
    Route::get('/show/{id}', 'CityManagerController@show')->name('CityManager.show')->middleware('permission:CRUD_city_managers');
    Route::get('/ban/{id}', 'CityManagerController@ban')->name('CityManager.ban')->middleware('permission:CRUD_city_managers');
    Route::get('/unban/{id}', 'CityManagerController@unban')->name('CityManager.unban')->middleware('permission:CRUD_city_managers');
    Route::delete('/{id}', 'CityManagerController@destroy')->name('CityManager.destroy')->middleware('permission:CRUD_city_managers');
});

Route::prefix('gymmanager')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'GymManagerController@index')->name('GymManager.index')->middleware('permission:CRUD_city_gyms_manager');
    Route::get('/data', 'GymManagerController@index_view')->name('GymManager.index_view')->middleware('permission:CRUD_city_gyms_manager');
    Route::get('/show/{id}', 'GymManagerController@show')->name('GymManager.show')->middleware('permission:CRUD_city_gyms_manager');
    Route::get('/create', 'GymManagerController@create')->name('GymManager.create')->middleware('permission:CRUD_city_gyms_manager');
    Route::post('/data', 'GymManagerController@store')->name('GymManager.store')->middleware('permission:CRUD_city_gyms_manager');
    Route::get('/{id}/edit', 'GymManagerController@edit')->name('GymManager.edit')->middleware('permission:CRUD_city_gyms_manager');
    Route::delete('/{id}', 'GymManagerController@destroy')->name('GymManager.destroy')->middleware('permission:CRUD_city_gyms_manager');
    Route::put('/{id}', 'GymManagerController@update')->name('GymManager.update')->middleware('permission:CRUD_city_gyms_manager');
    Route::get('/ban/{id}', 'GymManagerController@ban')->name('GymManager.ban')->middleware('permission:CRUD_city_gyms_manager');
    Route::get('/unban/{id}', 'GymManagerController@unban')->name('GymManager.unban')->middleware('permission:CRUD_city_gyms_manager');
});

Route::prefix('gyms')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'GymController@index')->name('Gym.index')->middleware('permission:CRUD_gyms');
    Route::get('/data', 'GymController@index_view')->name('Gym.index_view')->middleware('permission:CRUD_gyms');
    Route::get('/create', 'GymController@create')->name('Gym.create')->middleware('permission:CRUD_gyms');
    Route::post('/data', 'GymController@store')->name('Gym.store')->middleware('permission:CRUD_gyms');
    Route::get('/show/{id}', 'GymController@show')->name('Gym.show')->middleware('permission:CRUD_gyms');
    Route::get('/{id}/edit', 'GymController@edit')->name('Gym.edit')->middleware('permission:CRUD_gyms');
    Route::put('/{id}', 'GymController@update')->name('Gym.update')->middleware('permission:CRUD_gyms');
});


Route::prefix('trainingpackages')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'TrainingPackagesController@index')->name('TrainingPackagesController.index')->middleware('permission:CRUD_trainingPackage');
    Route::get('/all', 'TrainingPackagesController@index_view')->name('TrainingPackagesController.index_view')->middleware('permission:CRUD_trainingPackage');
    Route::get('/show/{id}', 'TrainingPackagesController@show')->name('TrainingPackagesController.show')->middleware('permission:CRUD_trainingPackage');

    Route::get('/create', 'TrainingPackagesController@create')->name('TrainingPackagesController.create')->middleware('permission:CRUD_trainingPackage');
    Route::post('', 'TrainingPackagesController@store')->name('TrainingPackagesController.store')->middleware('permission:CRUD_trainingPackage');
    Route::get('/{id}/edit', 'TrainingPackagesController@edit')->name('TrainingPackagesController.edit')->middleware('permission:CRUD_trainingPackage');
    Route::put('/{id}', 'TrainingPackagesController@update')->name('TrainingPackagesController.update')->middleware('permission:CRUD_trainingPackage');
    Route::get('/{id}', 'TrainingPackagesController@destroy')->name('TrainingPackagesController.destroy')->middleware('permission:CRUD_trainingPackage');
});



Route::get('/attendance/dataAjax', 'AttendanceUserController@index')->name('Attendance.index')->middleware('permission:attendance');
Route::get('/attendance/data', 'AttendanceUserController@index_view')->name('Attendance.index_view')->middleware('permission:attendance');


Route::prefix('trainees')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'TraineesController@index')->name('TraineesController.index')->middleware('permission:CRUD_users');
    Route::get('/all', 'TraineesController@index_view')->name('TraineesController.index_view')->middleware('permission:CRUD_users');
    Route::get('/{id}', 'TraineesController@destroy')->name('TraineesController.destroy')->middleware('permission:CRUD_users');
    Route::get('/{id}/edit', 'TraineesController@edit')->name('TraineesController.edit')->middleware('permission:CRUD_users');
    Route::put('/{id}', 'TraineesController@update')->name('TraineesController.update')->middleware('permission:CRUD_users');
});

Route::prefix('trainingsession')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'TrainingSessionController@index')->name('TrainingSession.index')->middleware('permission:CRUD_training_sessions');
    Route::get('/all', 'TrainingSessionController@index_view')->name('TrainingSession.index_view')->middleware('permission:CRUD_training_sessions');
    Route::get('/create', 'TrainingSessionController@create')->name('TrainingSession.create')->middleware('permission:CRUD_training_sessions');
    Route::post('', 'TrainingSessionController@store')->name('TrainingSession.store')->middleware('permission:CRUD_training_sessions');
    Route::get('/{id}/edit', 'TrainingSessionController@edit')->name('TrainingSession.edit')->middleware('permission:CRUD_training_sessions');
    Route::put('/{id}', 'TrainingSessionController@update')->name('TrainingSession.update')->middleware('permission:CRUD_training_sessions');
    Route::get('show/{id}', 'TrainingSessionController@show')->name('TrainingSession.show')->middleware('permission:CRUD_training_sessions');
    Route::get('/{id}', 'TrainingSessionController@destroy')->name('TrainingSession.destroy')->middleware('permission:CRUD_training_sessions');
});



Route::prefix('coaches')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'CoachesController@index')->name('Coaches.index')->middleware('role:admin|city_manager|gym_manager');
    Route::get('/data', 'CoachesController@index_view')->name('Coaches.index_view')->middleware('role:admin|city_manager|gym_manager');
    Route::get('/create', 'CoachesController@create')->name('Coaches.create')->middleware('role:admin|city_manager|gym_manager');
    Route::post('/data', 'CoachesController@store')->name('Coaches.store')->middleware('role:admin|city_manager|gym_manager');
    Route::get('/{id}/edit', 'CoachesController@edit')->name('Coaches.edit')->middleware('role:admin|city_manager|gym_manager');
    Route::put('/{id}', 'CoachesController@update')->name('Coaches.update')->middleware('role:admin|city_manager|gym_manager');
    Route::get('/show/{id}', 'CoachesController@show')->name('Coaches.show')->middleware('role:admin|city_manager|gym_manager');
    // Route::get('/ban/{id}', 'CoachesController@ban')->name('Coaches.ban');
    // Route::get('/unban/{id}', 'CoachesController@unban')->name('Coaches.unban');
    Route::get('/{id}', 'CoachesController@destroy')->name('Coaches.destroy')->middleware('role:admin|city_manager|gym_manager');
});


Route::prefix('revenue')->middleware('auth')->group(function () {
    Route::get('/dataAjax', 'RevenueController@index')->name('revenue.index')->middleware('permission:revenue');
    Route::get('/data', 'RevenueController@index_view')->name('revenue.index_view')->middleware('permission:revenue');
    Route::get('/create', 'RevenueController@create')->name('revenue.create')->middleware('permission:revenue');
    Route::post('/data', 'RevenueController@store')->name('revenue.store')->middleware('permission:revenue');
    Route::get('/{id}/edit', 'RevenueController@edit')->name('revenue.edit')->middleware('permission:revenue');
    Route::put('/{id}', 'RevenueController@update')->name('revenue.update')->middleware('permission:revenue');
    Route::get('/show/{id}', 'RevenueController@show')->name('revenue.show')->middleware('permission:revenue');
    Route::post('/buy', 'RevenueController@buy')->name('revenue.buy')->middleware('permission:revenue');

    // Route::get('/ban/{id}', 'RevenueController@ban')->name('revenue.ban');
    // Route::get('/unban/{id}', 'RevenueController@unban')->name('revenue.unban');
    Route::get('/{id}', 'RevenueController@destroy')->name('revenue.destroy')->middleware('permission:revenue');
});
