<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\tw_corporativos;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(tw_corporativos::class, function (Faker $faker) {
    return [
        'S_NombreCorto' => $faker->name(),
        'S_NombreCompleto' => $faker->name." ".$faker->lastName,
        'S_LogoURL' => $faker->url(),
        'S_DBName' => Str::random(15),
        'S_DBUsuario' => Str::random(10),
        'S_DBPassword' => Str::random(10),
        'S_SystemUrl' => $faker->url(),
        'S_Activo' => random_int(1,2),
        'D_FechaIncorporacion' => now(),
        'created_at' => now(),
        'updated_at' => null,
        'deleted_at' => null,
        'tw_usuarios_id' => random_int(1,10),
        'FK_Asignado_id' => null
    ];
});
