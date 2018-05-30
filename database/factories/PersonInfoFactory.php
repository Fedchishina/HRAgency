<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'image_id' => rand(2,6),
        'person_id' => function () {
            //return factory(App\Person::class)->create()->id;
            return 1;
        },
    ];
});
