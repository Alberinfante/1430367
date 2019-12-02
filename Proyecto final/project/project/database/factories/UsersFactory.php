<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Users;
use Faker\Generator as Faker;

$factory->define(Users::class, function (Faker $faker) {

    return [
        'name' => $faker->word,
        'apellidos' => $faker->word,
        'celular' => $faker->word,
        'fechanacimiento' => $faker->word,
        'ciudad' => $faker->word,
        'pais' => $faker->word,
        'estado' => $faker->word,
        'email' => $faker->word,
        'password' => $faker->word,
        'remember_token' => $faker->word,
        'saldo' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
