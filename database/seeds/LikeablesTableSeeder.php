<?php

use Chatty\Models\Like;
use Illuminate\Database\Seeder;

class LikeablesTableSeeder extends Seeder
{
	public function run()
	{
		Like::truncate();
	} // run
}
