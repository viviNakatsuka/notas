<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Nota::class, function (Faker\Generator $faker) {
    return [
        //'protocolo_origen'  => $faker->sentence(10),
        'protocolo_origen'  => $faker->text(10),
        'referencia'        => $faker->text(10),
        
        /*
             $table->increments('id');
            $table->string('protocolo_origen',10);
            $table->string('referencia',10);
            $table->date('fecha_doc');
            $table->date('fecha_entrada');
            $table->string('asunto',20);
            $table->date('fecha_salida');
            $table->date('pide_respuesta');
            $table->date('estado');
            $table->string('observaciones',20);
            $table->integer('dto_id');
            $table->timestamps();         */
    ];
});

$factory->define(App\Departament::class, function (Faker\Generator $faker) {
    return [
        'id'=> $faker->rand(0,2),
        'name' => $faker->name,
    ];
});

