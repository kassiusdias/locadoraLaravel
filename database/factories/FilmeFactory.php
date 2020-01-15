<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Filme;
use Faker\Generator as Faker;

$factory->define(Filme::class, function (Faker $faker) {
    return [
        'titulo' => $faker->name,
        'sinopse' => $faker->address,
    
       "id_protagonista" => $faker->numberBetween($min = 1, $max = 60),
       "id_genero" => $faker->numberBetween($min = 1, $max = 6),




        //
    ];
});
