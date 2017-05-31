<?php

use Carbon\Carbon;
use Chatty\Models\Status;
use Illuminate\Database\Seeder;

class StatusesTableSeeder extends Seeder
{
	public function run()
	{
		Status::truncate();

		$seedStatusReplies = true;

		$faker = Faker\Factory::create();

		foreach (range(20, 1) as $key) {
			$timePosted = Carbon::now()->subDays($key);

			Status::create([
				'user_id' => ($key <= 4 ? $key : rand(1, 3)),
				'body' => $faker->sentence(5, false),
				'created_at' => $timePosted,
				'updated_at' => $timePosted,
			]);
		}

		if ($seedStatusReplies) {
			$status = Status::latest()->first();

			foreach (range(1, 4) as $key) {
				$timePosted = Carbon::now()->subHours(4 - $key);

				$status->replies()->create([
					'body' => $faker->sentence(5, false),
					'user_id' => $key,
					'created_at' => $timePosted,
					'updated_at' => $timePosted,
				]);
			}
		}
	} // run
}
