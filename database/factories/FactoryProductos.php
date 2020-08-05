<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Producto;
use Faker\Generator as Faker;
use App\Categoria;

$factory->define(Producto::class, function (Faker $faker) {
    $categorias = Categoria::all()->random(1)->first();
    return [
        'nombre' => $faker->sentence(6),
        'precio' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 4000), 
        'descripcion' => $faker->paragraph(2),
        'stock' => $faker->numberBetween($min = 20, $max = 300),
        'created_at' => $faker->date(),
        'updated_at' => $faker->date(),
        'categoria_id' => $categorias->id

    ];
});
