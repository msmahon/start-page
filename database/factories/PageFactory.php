<?php

use Faker\Generator as Faker;

$factory->define(StartPage\Page::class, function (Faker $faker) {
    return [
        'slug' => $faker->uuid,
        'name' => $faker->company,
        'theme' => $faker->randomElement(['cool', 'default']),
    ];
});
