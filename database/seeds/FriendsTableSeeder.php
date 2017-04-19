<?php

use Illuminate\Database\Seeder;

class FriendsTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('friends')->truncate();

		DB::table('friends')->insert([
			[
				'user_id' => 1,
				'friend_id' => 2,
				'accepted' => 1,
			],
			[
				'user_id' => 3,
				'friend_id' => 1,
				'accepted' => 1,
			],
		]);
	}
}
