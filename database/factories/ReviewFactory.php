<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Review::class, function (Faker $faker) {

    return [
        'title' => $faker->realText($maxNbChars = 40, $indexSize = 2),
        'body' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'rating' => rand(1,10),
        'item_id' => rand(1,20),
        'author_id' => rand(1,50)
    ];
});
