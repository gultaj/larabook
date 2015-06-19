<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class StatusesTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

        $users = User::lists('id');

		foreach(range(1, 250) as $index)
		{
			Status::create([
                'user_id' => $faker->randomElement($users),
                'body' => $faker->sentence,
                'created_at' => $faker->dateTime,
			]);
		}
	}

}