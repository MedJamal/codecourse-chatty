<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index(){
		$friends	= Auth::user()->friends();
		$requests	= Auth::user()->friendRequests();
		
		return view('friends.index')
			->withFriends($friends)
			->withRequests($requests);
	}

	public function getAdd($username){
		$user = User::where('username', $username)->firstOrFail();

		if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())){
			return redirect()
				->route('profile.index', ['username' => $username])
				->withAlert('Friend request already pending.');
		}

		if(Auth::user()->isFriendsWith($user)){
			return redirect()
				->route('profile.index', ['username' => $username])
				->withAlert('You are already friends.');
		}

		Auth::user()->addFriend($user);

		return redirect()
			->route('profile.index', ['username' => $username])
			->withAlert('Friend request sent.');
	}
}
