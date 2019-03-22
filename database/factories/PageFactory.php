<?php

use Faker\Generator as Faker;

$factory->define(StartPage\Page::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory('StartPage\User')->create()->id;
        },
        'slug' => $faker->uuid,
        'name' => $faker->domainWord,
        'theme' => $faker->randomElement(['cool', 'default']),
    ];
});
