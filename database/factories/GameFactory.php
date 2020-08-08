<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */

use App\Game;
use Faker\Generator as Faker;


$factory->define(Game::class, function (Faker $faker) {
    return [
        'nombre' => $faker->text,
        'genero' => $faker->text,
        'sinopsis' => $faker->text(1024),
    ];
});
