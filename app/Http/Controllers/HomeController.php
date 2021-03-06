<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\Models\Status;

class HomeController extends Controller{

	public function index(){
		if(Auth::check()){
			$statuses = Status::whereNull('parent_id')->where(function($query){
				return $query->where('user_id', Auth::id())
					->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
			})
			->latest()
			->paginate(20);
			
			return view('timeline')->with(compact('statuses'));
		}

		return view('home');
	}
	
}
