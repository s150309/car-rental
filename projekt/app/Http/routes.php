<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});


Route::post('realise_order', 'HomeController@realise_order');


Route::group(['middleware' => ['web']], function () {
Route::get('reservations/create/{id}', 'ReservationsController@create');
Route::post('reservations/dotpay/{id}', 'ReservationsController@dotpay');
Route::post('reservations/execute', 'ReservationsController@execute');
});



Route::group(['middleware' => ['web']], function () {
	Route::resource('cars', 'CarsController');
});


