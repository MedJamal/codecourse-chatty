<?php

// Home

Route::get('/', [
	'uses' => 'HomeController@index',
	'as' => 'home',
]);

// Authentication

Route::group(['middleware' => 'guest'], function () {
	Route::get('/signup', [
		'uses' => 'AuthController@getSignup',
		'as' => 'auth.signup',
	]);

	Route::post('/signup', [
		'uses' => 'AuthController@postSignup',
	]);

	Route::get('/signin', [
		'uses' => 'AuthController@getSignin',
		'as' => 'auth.signin',
	]);

	Route::post('/signin', [
		'uses' => 'AuthController@postSignin',
	]);
});

Route::get('/signout', [
	'uses' => 'AuthController@getSignout',
	'as' => 'auth.signout',
]);

// Search

Route::get('/search', [
	'uses' => 'SearchController@getResults',
	'as' => 'search.results',
]);

// User Profile

Route::get('/user/{username}', [
	'uses' => 'ProfileController@getProfile',
	'as' => 'profile.index',
]);

Route::group(['middleware' => 'auth'], function () {
	Route::get('/profile/edit', [
		'uses' => 'ProfileController@getEdit',
		'as' => 'profile.edit',
	]);

	Route::post('/profile/edit', [
		'uses' => 'ProfileController@postEdit',
	]);
});