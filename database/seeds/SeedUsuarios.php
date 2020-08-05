<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class SeedUsuarios extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
       'name'=> 'Juan',
       'email' => 'juan@juan.com',
       'apellido' => 'Perez',
       'password' => Hash::make('123456789'),
       'is_admin' => 0,
       'created_at' => Carbon::now(),
       'updated_at' => Carbon::now()
     ]);
     DB::table('users')->insert([
       'name'=> 'Admin',
       'email' => 'admin@admin.com',
       'apellido' => 'Administrador',
       'password' => Hash::make('123456789'),
       'is_admin' => 1,
       'created_at' => Carbon::now(),
       'updated_at' => Carbon::now()
     ]);
 }
}
