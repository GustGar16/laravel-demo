<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(1)->create(['email' => 'user@test.com']);
        \App\Models\City::factory(10)->create();
        \App\Models\Client::factory(10)->create();
    }
}
