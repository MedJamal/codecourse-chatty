<?php

// Home

Route::get('/', 'HomeController@index')->name('home');

// Authentication

Route::group(['middleware' => 'guest'], function () {

	Route::get('/signup', 'AuthController@getSignup')->name('auth.signup');

	Route::post('/signup', 'AuthController@postSignup');

	Route::get('/signin', 'AuthController@getSignin')->name('auth.signin');

	Route::post('/signin', 'AuthController@postSignin');

});

Route::get('/signout', 'AuthController@getSignout')->name('auth.signout');

// Search

Route::get('/search', 'SearchController@getResults')->name('search.results');

// User Profile

Route::get('/user/{username}', 'ProfileController@getProfile')->name('profile.index');

Route::group(['middleware' => 'auth'], function () {

	Route::get('/profile/edit', 'ProfileController@getEdit')->name('profile.edit');

	Route::post('/profile/edit', 'ProfileController@postEdit');

	Route::get('/friends', 'FriendController@index')->name('friends.index');

	Route::get('/friends/add/{username}', 'FriendController@getAdd')->name('friends.add');

	Route::get('/friends/accept/{username}', 'FriendController@getAccept')->name('friends.accept');

});