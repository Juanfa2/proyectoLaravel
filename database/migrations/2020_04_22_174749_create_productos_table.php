<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('idProducto');
            $table->string('nombre');
            $table->float('precio', 8, 2);
            $table->text('descripcion')->nullable();
            $table->integer('valoracion')->default(5);
            $table->integer('stock');
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
