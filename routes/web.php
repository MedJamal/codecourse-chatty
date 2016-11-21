<?php

// Home

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home',
]);

// Authentication

Route::get('/signup', [
	'uses' => 'AuthController@getSignup',
	'as' => 'auth.signup',
]);

Route::post('/signup', [
	'uses' => 'AuthController@postSignup',
]);
