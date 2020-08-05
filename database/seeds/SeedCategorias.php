<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SeedCategorias extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('categorias')->insert([
        	'nombre'=> 'Cotillon',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
         DB::table('categorias')->insert([
        	'nombre'=> 'Ambientacion',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
          DB::table('categorias')->insert([
        	'nombre'=> 'Reposteria',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
           DB::table('categorias')->insert([
        	'nombre'=> 'Golosinas',
        	'created_at' => Carbon::now(),
        	'updated_at' => Carbon::now()
        ]);
    }
}
