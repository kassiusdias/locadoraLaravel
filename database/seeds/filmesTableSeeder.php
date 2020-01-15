<?php

use Illuminate\Database\Seeder;
use App\Filme;

class filmesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Filme::class, 60)->create();
    }
}
