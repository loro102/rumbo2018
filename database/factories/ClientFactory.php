<?php

use App\User;
use Faker\Generator as Faker;

$factory->define(App\Client::class, function (Faker $faker) {

    return [
        'nombre' => $faker->name,
        'apellidos' => $faker->lastName,
        'nif' => $faker->randomNumber(),
        'direccion'=>$faker->address,
        'codigopostal' => $faker->postcode,
        'localidad' => $faker->city,
        'provincia' => $faker->state,
        'fechanacimiento' => $faker->date('Y-m-d'),
        'telefono1' => $faker->phoneNumber,
        'telefono2' => $faker->phoneNumber,
        'movil' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'iban'=>$faker->iban('es'),
        'nota'=>$faker->text,
        'user'=>User::all()->random()->id,
        //
    ];
});
