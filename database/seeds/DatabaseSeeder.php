<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        factory(StartPage\User::class, 20)->create()->each(function ($user) {
            $user->pages()->save(factory(StartPage\Page::class)->make());
        });

    }
}
