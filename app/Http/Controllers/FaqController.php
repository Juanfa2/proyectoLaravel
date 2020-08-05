<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
    public function agregar(){
      $preguntas = Faq::all();
      $vac = compact("preguntas");
      return view("preguntasAgregar", $vac);
    }

    public function guardar(Request $request){

      $errores = [
        "titulo" => 'required|string|max:60|min:3',
        "pregunta" => 'required|string',
      ];

      $mensajes = [
        'required' => "El  :attribute es necesario",
        'max' => "El  :attribute tiene un maximo de :max caracteres ",
        'min' => "El  :attribute debe ser como minimo de :min caracteres",
        'numeric' => "El :attribute debe ser numerico",
        'string' => "El :attribute debe ser solo letras"
      ];

      $this->validate($request,$errores,$mensajes);

      $pregunta = new Faq();
      $pregunta->titulo = $request["titulo"];
  #    $contacto->idContacto = 'incremets'
      $pregunta->pregunta = $request["pregunta"];

      $pregunta->save();

      return redirect("/preguntas");

    }
}
