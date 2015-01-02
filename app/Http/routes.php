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

Route::get('/', function() {
	return redirect(env('REDIRECT', 'https://www.google.com/'));
});

Route::group(['middleware' => 'auth'], function() {
	Route::resource('panel', 'SlugController', array('except' => array('show')));
});

Route::get('{slug}', 'SlugController@show');


Route::get('auth/register', 'AuthController@register');
Route::post('auth/register', 'AuthController@doRegister');

Route::get('auth/login', 'AuthController@login');
Route::post('auth/login', 'AuthController@doLogin');

Route::post('auth/logout', 'AuthController@logout');
