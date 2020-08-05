<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contacto;

class ContactoController extends Controller
{
  public function agregar(){
      return view("contactoAgregar");
  }

  public function guardar(Request $request){

    $errores = [
      "nombre" => 'required|string|max:60|min:3',
      "email" => 'required|string',
      "celular" => 'required|numeric|',
      "mensaje" => 'required|string',
    ];

    $mensajes = [
      'required' => "El  :attribute es necesario",
      'max' => "El  :attribute tiene un maximo de :max caracteres ",
      'min' => "El  :attribute debe ser como minimo de :min caracteres",
      'numeric' => "El :attribute debe ser numerico",
      'string' => "El :attribute debe ser solo letras"
    ];

    $this->validate($request,$errores,$mensajes);

    $contacto = new Contacto();
    $contacto->nombre = $request["nombre"];
#    $contacto->idContacto = 'incremets'
    $contacto->email = $request["email"];
    $contacto->celular = $request["ce slular"];
    $contacto->mensaje = $request["mensaje"];
    $contacto->save();

    return redirect("/contacto");

  }
}
