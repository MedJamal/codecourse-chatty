<?php

use Chatty\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
	public function run()
	{
		User::truncate();

		User::create([
			'email'		=> 'ransan32@yahoo.com',
			'username'	=> 'ransan32',
			'password'	=> bcrypt('password'),
			'firstname'	=> 'Ranie',
			'lastname'	=> 'Santos',
			'location'	=> 'Manila, PH',
		]);

		User::create([
			'email'		=> 'alex@codecourse.com',
			'username'	=> 'alex',
			'password'	=> bcrypt('password'),
			'firstname'	=> 'Alex',
			'lastname'	=> 'Garrett',
			'location'	=> 'London, UK',
		]);

		$faker = Faker\Factory::create();

		$names = ['barney', 'casey', 'dale', 'elma'];

		foreach ($names as $name) {
			User::create([
				'email'		=> $name . '@codecourse.com',
				'username'	=> $name,
				'password'	=> bcrypt('password'),
				'firstname'	=> ucfirst($name),
				'lastname'	=> $faker->lastName(),
			]);
		}
	} // run
}
