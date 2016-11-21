<?php

namespace Chatty\Http\Controllers;

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
	
}