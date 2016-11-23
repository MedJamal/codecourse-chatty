<?php

namespace Chatty\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function postStatus(Request $request){
		$this->validate($request, [
			'status' => 'required|max:1000',
		]);

		Auth::user()->statuses()->create([
			'body' => $request->status,
		]);

		return redirect()
			->route('home')
			->with('alert', 'Status posted.');
	}
}
