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

// User Profile

Route::get('/user/{username}', 'ProfileController@getProfile')->name('profile.index');

Route::group(['middleware' => 'auth'], function () {

	Route::get('/profile/edit', 'ProfileController@getEdit')->name('profile.edit');

	Route::post('/profile/edit', 'ProfileController@postEdit');

	// Search

	Route::get('/search', 'SearchController@getResults')->name('search.results');

	// Friends

	Route::get('/friends', 'FriendController@index')->name('friends.index');

	Route::get('/friends/add/{username}', 'FriendController@getAdd')->name('friends.add');

	Route::get('/friends/accept/{username}', 'FriendController@getAccept')->name('friends.accept');

	Route::post('/friends/delete/{username}', 'FriendController@postDelete')->name('friends.delete');

	// Statuses

	Route::post('/status', 'StatusController@postStatus')->name('status.post');

	Route::post('/status/{statusId}/reply', 'StatusController@postReply')->name('status.reply');

	Route::get('/status/{statusId}/like', 'StatusController@getLike')->name('status.like');

});
