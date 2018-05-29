<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'comment' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'email' => $faker->safeEmail,
        'moderated' => $faker->boolean,
    ];
});
