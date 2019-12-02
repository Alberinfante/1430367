<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Solicitudretiro;
use Faker\Generator as Faker;

$factory->define(Solicitudretiro::class, function (Faker $faker) {

    return [
        'codigo' => $faker->word,
        'cantidadretiro' => $faker->randomDigitNotNull,
        'tiporetiro_id' => $faker->randomDigitNotNull,
        'user_id' => $faker->randomDigitNotNull,
        'estado' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
