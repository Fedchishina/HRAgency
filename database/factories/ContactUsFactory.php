<?php

use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'complete' => $faker->boolean,
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'text' => $faker->sentence($nbWords = 6, $variableNbWords = true),
    ];
});
