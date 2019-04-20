<?php

use Faker\Generator as Faker;
use Illuminate\Foundation\Auth\User;

$factory->define(StartPage\Page::class, function (Faker $faker) {
    return [
        // 'user_id' => $this->User->id,
        'slug' => $faker->uuid,
        'name' => $faker->domainWord,
        'theme' => $faker->randomElement(['cool', 'default']),
    ];
});
