<?php

namespace Chatty\Http\Controllers;

use Auth;
use Chatty\Models\Status;

class HomeController extends Controller{

	public function index(){
		if(Auth::check()){
			$statuses = Status::notReply()->where(function($query){
				return $query->where('user_id', Auth::id())
					->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
			})
			->orderBy('created_at', 'DESC')
			->paginate(10);
			
			return view('timeline.index')
				->with('statuses', $statuses);
		}

		return view('home');
	}
	
}