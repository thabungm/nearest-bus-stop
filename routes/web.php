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
    return redirect('/admin/bus/create');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/nearest-stops/{latitude?}/{longitude?}', 'BusStopController@findNearestStops')->name('nearestStops');
Route::get('/bus-stops/{id}/buses', 'BusStopController@getBusesByBusStop');
Route::group(['prefix' => 'admin'], function () {
    Route::resource('/bus', 'BusController')->names([
            'index' => 'busList',
            'create' => 'create.form',
            'store' => 'create.bus',
            'show' => 'view.bus',
            'edit' => 'edit.bus'
        ]);
    Route::post('/bus/{bus}', 'BusController@update')->name('update.bus');

    Route::resource('/bus-stop', 'BusStopController')->names([
            'index' => 'busStopList',
            'create' => 'create.busStopForm',
            'store' => 'create.busStop',
            'show' => 'view.busStop',
            'edit' => 'edit.busStop'
        ]);
    Route::post('/bus-stop/{id}', 'BusStopController@update')->name('update.busStop');
});