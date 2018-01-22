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

$factory->define(App\Comment::class, function (Faker $faker) {

    return [
        'body' => $faker->realText($maxNbChars = 200, $indexSize = 2),
        'review_id' => rand(1,50),
        'author_id' => rand(1,50)
    ];
});
