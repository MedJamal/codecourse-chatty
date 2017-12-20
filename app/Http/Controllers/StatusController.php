<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
	public function postStatus(){
		$this->validate(request(), [
			'status' => 'required|max:1000',
		]);

		Auth::user()->statuses()->create([
			'body' => request('status'),
		]);

		return redirect()
			->route('home')
			->with('alert', 'Status posted.');
	}

	public function postReply($statusId){
		$this->validate(request(), [
			"reply-{$statusId}" => 'required|max:500',
		], [
			'required'	=> 'The reply field is required.',
			'max'		=> 'The reply may not be greater than :max characters.',
		]);

		$status = Status::whereNull('parent_id')->findOrFail($statusId);

		/*
			if you are NOT friends with the owner of the status
			AND you don't own the status

			without the 2nd condition you can't reply to your own statuses
		*/

		if(!Auth::user()->isFriendsWith($status->user) && Auth::id() !== $status->user->id){
			return redirect()
				->route('home')
				->with('alert', "Add {$status->user->getFirstNameOrUsername()} as a friend to reply to their statuses.");
		}

		$status->replies()->create([
			'body' => request("reply-{$statusId}"),
			'user_id' => Auth::id(),
		]);

		return back();
	}

	public function getLike($statusId){
		$status = Status::findOrFail($statusId);

		if(!Auth::user()->isFriendsWith($status->user)){
			return back()
				->with('alert', "Add {$status->user->getFirstNameOrUsername()} as a friend to like their statuses.");
		}

		if(Auth::user()->hasLikedStatus($status)){
			return back();
		}

		$status->likes()->create([
			'user_id' => Auth::id(),
		]);

		return back();
	}
}
