<?php

use Illuminate\Database\Seeder;
use Chatty\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		User::create([
			'email'		=> 'ransan32@yahoo.com',
			'username'	=> 'ransan32',
			'password'	=> bcrypt('password'),
		]);
		
		User::create([
			'email'		=> 'alex@codecourse.com',
			'username'	=> 'alex',
			'password'	=> bcrypt('password'),
		]);
		
        User::create([
			'email'		=> 'dale@codecourse.com',
			'username'	=> 'dale',
			'password'	=> bcrypt('password'),
			'firstname'	=> 'Dale',
			'lastname'	=> 'Garrett',
		]);

		User::create([
			'email'		=> 'billy@codecourse.com',
			'username'	=> 'billy',
			'password'	=> bcrypt('password'),
			'firstname'	=> 'Billy',
			'lastname'	=> 'Garrett',
		]);
    }
}
