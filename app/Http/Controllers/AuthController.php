<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller{

	public function getSignup(){
		return view('auth.signup');
	}

	public function postSignup(Request $request){
		$this->validate($request, [
			'email' 	=> 'required|unique:users|max:70|email',
			'username' 	=> 'required|unique:users|max:40|alpha_dash',
			'password' 	=> 'required|min:8|confirmed',
		]);

		User::create([
			'email'		=> $request->email,
			'username'	=> $request->username,
			'password'	=> bcrypt($request->password),
		]);

		return redirect()
			->route('home')
			->with('alert', 'Your account has been created and you can now sign in.');		
	}

	public function getSignin(){
		return view('auth.signin');
	}

	public function postSignin(Request $request){
		$this->validate($request, [
			'email' 	=> 'required',
			'password' 	=> 'required',
		]);

		if(!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))){
			return redirect()
				->back()
				->with('alert', 'Could not sign you in with those details.');
		}

		return redirect()
			->route('home')
			->with('alert', 'You are now signed in.');
	}
	
	public function getSignout(){
		Auth::logout();

		return redirect()
			->route('home')
			->with('alert', 'You have been signed out.');
	}
}