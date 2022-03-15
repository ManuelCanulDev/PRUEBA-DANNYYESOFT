<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\tw_documentos;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(tw_documentos::class, function (Faker $faker) {
    return [
        'S_Nombre' => $faker->name(),
        'N_Obligatorio' => random_int(1,2),
        'S_Descripcion' => $faker->text(60),
    ];
});
