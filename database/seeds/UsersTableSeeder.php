<?php

use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 20)->create()->each(function ($user) {
            $user->pages()->saveMany(factory(StartPage\Page::class, rand(1, 3))->make());
        });
    }
}
