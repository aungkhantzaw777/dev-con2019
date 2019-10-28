<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Speaker;
use Faker\Generator as Faker;

$factory->define(Speaker::class, function (Faker $faker) {
	return [
		'name' => $faker->name(),
		'position' => $faker->word(),
		'company' => $faker->word(),
		'info' => $faker->sentence(),
		'facebook_link' => 'https://www.facebook.com/'.$faker->name(),
		'linkedin' => 'https://www.linkedin/'.$faker->name(),
		'github_link' => 'https://www.github.com/'.$faker->name(),
		'schedule_id' => function() {
			return factory('App\Schedule')->create()->id;
		},
	];
});
