<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
	public function run()
	{
		$this->call(UsersTableSeeder::class);
		$this->call(FriendsTableSeeder::class);
		$this->call(StatusesTableSeeder::class);
		$this->call(LikeablesTableSeeder::class);
	}
}
