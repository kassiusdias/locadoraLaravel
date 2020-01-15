<?php

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
        $this->call(usersTableSeeder::class);
        $this->call(generosTableSeeder::class);
        $this->call(AtoresTableSeeder::class);
        $this->call(filmesTableSeeder::class);
    }
}
