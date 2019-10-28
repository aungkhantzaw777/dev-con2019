<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Shedule;
use Faker\Generator as Faker;

$factory->define(Shedule::class, function (Faker $faker) {
    return [
        'schedule_time' => date("h:i"),
        'schedule_sec' => $faker->unique()->numerify("######"),
        'schedule_title' => $faker->word(),
        'clap' => 0,
        'schedule_location' => $faker->address(),
        'schedule_type' => $faker->word(),
        'schedule_date' => $faker->DateTime(date('y.m.d h:i:s'), 'UTC'),
        'schedule_desc' => $faker->paragraph(),
    ];
});
