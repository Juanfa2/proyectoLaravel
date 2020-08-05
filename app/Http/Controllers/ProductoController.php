<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\Storage;
use App\Categoria;
use App\Carrito;
use Session;

class ProductoController extends Controller
{
    public function listar(){
    	$productos = Producto::paginate(9); 
        $categorias = Categoria::all();
    	return view('productos', compact('productos' , 'categorias'));
    }

    public function guardar(Request $request){
        //dd($request);
    	$errores = [
    		"nombre" => 'required|string|max:60|min:3',
    		"precio" => 'required|numeric',
    		"descripcion" => 'string|max:255|',
            "stock" => 'required|numeric',
            "categoria" => 'required|numeric',
    	];

    	$mensajes = [
    		'required' => "El  :attribute es necesario",
    		'max' => "El  :attribute tiene un maximo de :max caracteres ",
    		'min' => "El  :attribute debe ser como minimo de :min caracteres",
    		'numeric' => "El :attribute debe ser numerico",
    		'string' => "El :attribute debe ser solo letras"
    	];

    	$this->validate($request,$errores,$mensajes);
    	 
    	$producto = new Producto();
    	$producto->nombre = $request["nombre"];
    	$producto->precio = $request["precio"];
    	$producto->descripcion = $request["descripcion"];
        $producto->stock = $request["stock"];
    	$producto->valoracion = 5;
        $producto->categoria_id = $request["categoria"];

        if ( $request->file("archivo") != null ) {
            $ruta = $request->file("archivo")->store("public/fotoProducto");
            $nombre = basename($ruta);
            $producto->foto = $nombre;
        }

    	$producto->save();

    	return redirect("/productos");



    }


     public function eliminar(Request $request){
    	$producto = Producto::find($request["id"]);
        $foto = $producto->foto;
        if ($foto != null ) {
           unlink(storage_path('app/public/fotoProducto/'.$foto));
        }

        $producto->delete();
    	return redirect("/productos");

    }

    public function agregar(){
        $categorias = Categoria::all();
        return view("productoAgregar", compact('categorias'));
    }

    public function ordenarProductos(Request $request){
        if ($request["order"] == "alto") {
            $productos = Producto::orderBy('precio','DESC')->paginate(9);
        }elseif ($request["order"]== "bajo") {
            $productos = Producto::orderBy('precio','ASC')->paginate(9);
        }elseif ($request["order"] == "alfabetico") {
            $productos = Producto::orderBy('nombre','ASC')->paginate(9);
        }else{
            return $this->listar();
        }
        $categorias = Categoria::all();
        
        return view('productos', compact('productos', 'categorias'));


    }

    public function actualizar(Request $request){
        
        $errores = [
            "nombre" => 'required|string|max:60|min:3',
            "precio" => 'required|numeric',
            "descripcion" => 'string|max:255|',
            "stock" => 'required|numeric',
            
        ];

        $mensajes = [
            'required' => "El  :attribute es necesario",
            'max' => "El  :attribute tiene un maximo de :max caracteres ",
            'min' => "El  :attribute debe ser como minimo de :min caracteres",
            'numeric' => "El :attribute debe ser numerico",
            'string' => "El :attribute debe ser solo letras"
        ];

        $this->validate($request,$errores,$mensajes);

        $producto = Producto::find($request["id"]);
        $producto->nombre = $request["nombre"];
        $producto->precio = $request["precio"];
        $producto->descripcion = $request["descripcion"];
        $producto->stock = $request["stock"];

        if($request["categoria"] != 0){
            $producto->categoria_id = $request["categoria"];
        }
        


        if ( $request->file("archivo") != null ) {
            $ruta = $request->file("archivo")->store("public/fotoProducto");
            $nombre = basename($ruta);
            $producto->foto = $nombre;
        }
         

        $producto->save();

        return redirect("/productos");
    }

    public function actualizarForm($id){
        $producto = Producto::find($id);
        $categorias = Categoria::all();

        return view('productoActualizar', compact('producto', 'categorias'));

    }

    public function buscarProductos(Request $request){
        $categorias = Categoria::all();
        $nombre = $request["campo"];
        $productos = Producto::where('nombre', 'like', '%' . $nombre . '%')->paginate(9);


        return view('productos', compact('productos', 'categorias'));
    }

    public function detalleProducto($id){
        $producto = Producto::find($id);
        return view('detalleProducto', compact('producto'));
    }

    public function categoriaShow($id){
        $nombreCate = Categoria::find($id);
        $nombreCate->nombre;
        $productos = Categoria::find($id)->productos()->paginate(9);
        $categorias = Categoria::all();

        return view('productos', compact('productos' , 'categorias', 'nombreCate'));
    }

    public function getAddToCart(Request $request, $id){
        $producto = Producto::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Carrito($oldCart);
        $cart->add($producto, $producto->idProducto);

        $request->session()->put('cart', $cart);
        return redirect("/productos");
    }

    public function removeToCart(Request $request, $id){

        $producto = Producto::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null ;
        $cart = new Carrito($oldCart);
        $cart->remove($producto->idProducto);

        $request->session()->put('cart', $cart);
        return redirect("/carrito");
    }

}
