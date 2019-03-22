<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(StartPage\User::class, 20)->create()->each(function ($user) {
            $user->pages()->saveMany(factory(StartPage\Page::class, rand(1, 3))->make());
        });
    }
}
