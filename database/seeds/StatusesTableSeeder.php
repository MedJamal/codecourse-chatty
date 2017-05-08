<?php

use Carbon\Carbon;
use Chatty\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
	public function run()
	{
		Status::truncate();

		$faker = Faker\Factory::create();

		foreach (range(1, 4) as $key) {
			$timePosted = Carbon::now()->subDays(4 - $key);

			Status::create([
				'user_id' => $key,
				'body' => $faker->sentence(5, false),
				'created_at' => $timePosted,
				'updated_at' => $timePosted,
			]);
		}

		foreach (range(1, 4) as $key) {
			Status::find(3)->replies()->create([
				'body' => $faker->sentence(5, false),
				'user_id' => $key,
			]);
		}
	} // run
}
