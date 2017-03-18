<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	public function run()
	{
		DB::table('users')->truncate();

		DB::table('users')->insert([
			[
				'email'		=> 'ransan32@yahoo.com',
				'username'	=> 'ransan32',
				'password'	=> bcrypt('password'),
				'firstname'	=> 'Ranie',
				'lastname'	=> 'Santos',
				'location'	=> 'Manila, PH',
			],
			[
				'email'		=> 'alex@codecourse.com',
				'username'	=> 'alex',
				'password'	=> bcrypt('password'),
				'firstname'	=> 'Alex',
				'lastname'	=> 'Garrett',
				'location'	=> 'London, UK',
			],
			[
				'email'		=> 'dale@codecourse.com',
				'username'	=> 'dale',
				'password'	=> bcrypt('password'),
				'firstname'	=> 'Dale',
				'lastname'	=> 'Garrett',
				'location'	=> null,
			],
			[
				'email'		=> 'billy@codecourse.com',
				'username'	=> 'billy',
				'password'	=> bcrypt('password'),
				'firstname'	=> 'Billy',
				'lastname'	=> 'Garrett',
				'location'	=> null,
			],
		]); // insert
	} // run
} // class
