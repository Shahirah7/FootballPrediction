<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


Route::get('/', 'HomeController@showHomepage');
Route::get('/about', 'HomeController@showAboutPage');

Route::get('/login', 'UserController@login');
Route::post('/login', 'UserController@doLogin');

Route::get('/register', 'UserController@register');
Route::post('/register', 'UserController@doRegister');

Route::group(array('before' => 'auth'), function() {
	Route::get('/account', 'HomeController@myAccount');

	Route::post('/join_game', 'GameController@joinGame');
	Route::post('/make_prediction', 'GameController@makePrediction');

	Route::get('/settings', 'UserController@settings');
	Route::get('/logout', 'UserController@logout');
});

Route::group(array('before' => 'admin'), function() {
	Route::get('/admin/dashboard', 'AdminController@dashboard');


	// Route::get('/logout', 'UserController@logout');
});

Route::get('/view_game/{game_id}', 'GameController@viewGame');

