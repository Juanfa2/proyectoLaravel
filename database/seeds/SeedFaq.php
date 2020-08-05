<?php

use Illuminate\Database\Seeder;

class SeedFaq extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('preguntas')->insert([
         'titulo' => 'devolucion'  ,
         'pregunta' => 'como realizar una devolucion',
         'respuesta' => 'La devolucion se realiza de este modo'
       ]);

       DB::table('preguntas')->insert([
         'titulo' => 'Metodos de pago',
         'pregunta' => 'Cuales son los medios de pago con lo que se puede realizar una compra ?',
         'respuesta' => 'Estos son los medios de pago'

       ]);
       DB::table('preguntas')->insert([
         'titulo' => 'Productos vencidos',
         'pregunta' => 'Que hacer si el producto recibido ya esta vencido',
         'respuesta' => 'Esto es lo que debe hacer con su producto vencido'

       ]);
       DB::table('preguntas')->insert([
         'titulo' => 'Metodos de Pago',
         'pregunta' => '¿Con que forma de pago cuentan?',
         'respuesta' => 'Estas son las formas de pago'

       ]);
       DB::table('preguntas')->insert([
         'titulo' => 'Envios',
         'pregunta' => '¿Hacen envios al interior?',
         'respuesta' => 'Si, hacemos envios al interior pore el siguiente medio'

       ]);
       DB::table('preguntas')->insert([
         'titulo' => 'Descuentos',
         'pregunta' => '¿Cuentan con alguna promocion en compras grandes?',
         'respuesta' => 'Las promociones y descuentos son los siguientes: a partir de compas mayor a'

       ]);
       DB::table('preguntas')->insert([
         'titulo' => 'devoluciones',
         'pregunta' => '¿Aceptan devoluciones en caso de disconformidad con el producto?',
         'respuesta' => 'Para devoluciones por disconformidad de producto, debe verificar los requisitos de cada categoria de productos y comenzar el tramite'

     ]);

    }
}
