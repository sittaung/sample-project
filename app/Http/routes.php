<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();
Route::get('/home', 'HomeController@index');
Route::resource('user', 'UserController');

Route::group(['middleware' => 'admin'], function() {
	Route::get('admin', 'AdminController@index');
	Route::get('/admin/dashboard', 'AdminController@index');
	Route::get('/admin/user', 'UserController@index');
});
Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
Route::post('/admin/login','AdminAuth\AuthController@login');
Route::get('/admin/logout','AdminAuth\AuthController@logout');



