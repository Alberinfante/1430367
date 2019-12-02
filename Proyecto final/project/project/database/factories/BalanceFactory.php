<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Balance;
use Faker\Generator as Faker;

$factory->define(Balance::class, function (Faker $faker) {

    return [
        'cantidad' => $faker->randomDigitNotNull,
        'mensaje' => $faker->word,
        'user_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'deleted_at' => $faker->date('Y-m-d H:i:s')
    ];
});
