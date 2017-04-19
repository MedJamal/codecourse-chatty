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
				'email'		=> 'billy@codecourse.com',
				'username'	=> 'billy',
				'password'	=> bcrypt('password'),
				'firstname'	=> 'Billy',
				'lastname'	=> 'Garrett',
				'location'	=> null,
			],
			[
				'email'		=> 'cathy@codecourse.com',
				'username'	=> 'cathy',
				'password'	=> bcrypt('password'),
				'firstname'	=> 'Cathy',
				'lastname'	=> 'Garrett',
				'location'	=> null,
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
				'email'		=> 'elma@codecourse.com',
				'username'	=> 'elma',
				'password'	=> bcrypt('password'),
				'firstname'	=> 'Elma',
				'lastname'	=> 'Garrett',
				'location'	=> null,
			],
		]); // insert
	} // run
} // class
