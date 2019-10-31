<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponser;
use Faker\Generator as Faker;

$factory->define(Sponser::class, function (Faker $faker) {
    return [
        'sponsor_id' => $faker->word(),
        'sponser_type' => $faker->word(),
        'sponsor_logo' => $faker->imageUrl( 640, 480),
        'sponsor_title' => $faker->word(),
        'sponsor_detail' => $faker->paragraph(),
    ];
});
