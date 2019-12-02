<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Tiporetiro;
use Faker\Generator as Faker;

$factory->define(Tiporetiro::class, function (Faker $faker) {

    return [
        'nombre' => $faker->word,
        'logo' => $faker->word,
        'cantidadminima' => $faker->randomDigitNotNull,
        'cantidadmaxima' => $faker->randomDigitNotNull,
        'cargofijo' => $faker->randomDigitNotNull,
        'porcentajecargo' => $faker->randomDigitNotNull,
        'tarifa' => $faker->randomDigitNotNull,
        'diaproceso' => $faker->word,
        'estado' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
