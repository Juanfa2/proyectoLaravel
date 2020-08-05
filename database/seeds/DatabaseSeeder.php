<?php

use Illuminate\Database\Seeder;
use App\Producto;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SeedUsuarios::class);
 		$this->call(SeedCategorias::class);
 		$this->call(SeedFaq::class);
    factory(Producto::class)->times(100)->create();

    }
}
