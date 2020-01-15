<?php

use Illuminate\Database\Seeder;
use App\Ator;

class AtoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Ator::class, 60)->create();
    }
}
