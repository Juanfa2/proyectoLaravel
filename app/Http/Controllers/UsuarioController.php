<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

    public function actualizar(Request $request){

        $error = [
            "name" => 'required|string|max:45|min:3',
            "apellido" => 'required|string|max:45|min:3',
            "email" => 'required|max:45|email:rfc,dns|unique'
        ];

        $msj = [
            'required' => "El  :attribute es necesario",
            'max' => "El  :attribute tiene un maximo de :max caracteres ",
            'min' => "El  :attribute debe ser como minimo de :min caracteres",
            'unique' => "El :attribute ya existe, por favor escribe otro",
            'string' => "El :attribute debe ser solo letras"
        ];


        Validator::make($request->all(), [
            "name" => 'required|string|max:45|min:3',
            "apellido" => 'required|string|max:45|min:3',
            "email" => 'required|max:45|email:rfc,dns|unique'
        ],[
            'required' => "El  :attribute es necesario",
            'max' => "El  :attribute tiene un maximo de :max caracteres ",
            'min' => "El  :attribute debe ser como minimo de :min caracteres",
            'unique' => "El :attribute ya existe, por favor escribe otro",
            'string' => "El :attribute debe ser solo letras"
        ]);



        $usuario = User::find($request["id"]);
        $usuario->name = $request["name"];
        $usuario->apellido = $request["apellido"];
        $usuario->email = $request["email"];


        if ( $request->file("archivo") != null ) {
            $ruta = $request->file("archivo")->store("public/userFoto");
            $nombre = basename($ruta);
            $usuario->foto = $nombre;
        }
         

        $usuario->save();

        return redirect("/usuario/perfil");
    }

}
