<?php

namespace Chatty\Http\Controllers;

use Chatty\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile($username){
		$user = User::where('username', $username)->firstOrFail();

		return view('profile.index')
			->withUser($user);
	}
}
