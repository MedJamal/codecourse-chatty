<?php

namespace Chatty\Http\Controllers;

use DB;
use Chatty\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getResults(){
		$keyword = request('keyword');
		
		if(!$keyword){
			return redirect()->route('home');
		}

		$users = User::where(DB::raw("CONCAT(firstname, ' ', lastname)"), 'LIKE', "%{$keyword}%")
			->orWhere('username', 'LIKE', "%{$keyword}%")
			->get();

		return view('results')
			->with('users', $users)
			->with('keyword', $keyword);
	}
}
