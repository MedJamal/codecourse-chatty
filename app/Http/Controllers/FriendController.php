<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function index(){
		$friends = Auth::user()->friends();
		
		return view('friends.index')
			->withFriends($friends);
	}
}
