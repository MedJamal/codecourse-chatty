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
		
		return view('friends')
			->with('friends', $friends)
			->with('requests', $requests);
	}

	public function getAdd($username){
		$user = User::where('username', $username)->firstOrFail();

		if(Auth::id() === $user->id){
			return redirect()->route('home');
		}

		if(Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())){
			return redirect()
				->route('profile.index', ['username' => $username])
				->with('alert', 'Friend request already pending.');
		}

		if(Auth::user()->isFriendsWith($user)){
			return redirect()
				->route('profile.index', ['username' => $username])
				->with('alert', 'You are already friends.');
		}

		Auth::user()->addFriend($user);

		return redirect()
			->route('profile.index', ['username' => $username])
			->with('alert', 'Friend request sent.');
	}

	public function getAccept($username){
		$user = User::where('username', $username)->firstOrFail();

		if(!Auth::user()->hasFriendRequestReceived($user)){
			return redirect()->route('home');
		}

		Auth::user()->acceptFriendRequest($user);

		return redirect()
			->route('profile.index', ['username' => $username])
			->with('alert', 'Friend request accepted.');
	}
}
