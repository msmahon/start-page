<?php

use Faker\Generator as Faker;

$factory->define(StartPage\Module::class, function (Faker $faker) {
    return [
        'type' => "bookmarks",
        'settings' => "{}",
    ];
});
