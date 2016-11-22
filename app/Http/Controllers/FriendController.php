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
}
