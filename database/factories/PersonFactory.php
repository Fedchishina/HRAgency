<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'parent' => '#',
        'children' => true,
        'salary_id' => rand(1,100),
    ];
});
