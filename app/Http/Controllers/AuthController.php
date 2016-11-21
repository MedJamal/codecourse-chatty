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
			->withAlert('Your account has been created and you can now sign in.');		
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
				// ->withAlert('Could not sign you in with those details.');
				->withAlert(bcrypt('password'));
		}

		return redirect()
				->route('home')
				->withAlert('You are now signed in.');
	}
	
	public function getSignout(){
		Auth::logout();

		return redirect()
				->route('home')
				->withAlert('You have been signed out.');
	}
}