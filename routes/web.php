<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::Get('/registro', function(){
	return view('registro');
});

Route::get('/', function(){
	return view('inicio');
});

Route::get('/inicio/sesion', function(){
	return view('inicioSesion');
});



#------------------------CONTACTO-----------------------


Route::get('/contacto', function(){
	return view('contacto');
});
Route::Get('/contacto', "ContactoController@agregar");
Route::post('/contacto/agregar','ContactoController@guardar');

#------------------------F.A.Q.-----------------------

Route::Get('/preguntas', "FaqController@agregar");
Route::post('/preguntas/agregar','FaqController@guardar');


#------------------------USUARIOS------------------------

Route::post('/registro/usuario', 'UsuarioController@guardar');

#Agrupo las rutas que solo pueden ser utiizadas por un usuario registrados

Route::group(['middleware' => 'auth'], function () {
	Route::get('usuario/perfil', function(){return view('usuarioPerfil');});
	Route::get('usuario/perfil/editar', function(){return view('usuarioEditar');});
	Route::post('usuario/perfil/editar', 'UsuarioController@actualizar');
	Route::get("/addToCart/{id}", "ProductoController@getAddToCart");
	Route::get("removeToCart/{id}", "ProductoController@removeToCart");
	Route::get('/carrito', function(){return view('carrito');});

});


#-----------------PRODUCTOS----------------------------------
#Agrupo rutas para que solo puedan ser utilizadas por el administrador

Route::group(['middleware' => 'admin'], function () {
    Route::Get('producto/agregar', "ProductoController@agregar");
	Route::post('/producto/agregar','ProductoController@guardar');
	Route::post('/producto/eliminar','ProductoController@eliminar');
	Route::post('/producto/actualizar' , 'ProductoController@actualizar');
	Route::get('/producto/actualizar/{id}', 'ProductoController@actualizarForm');
	Route::post('/categoria/agregar', 'CategoriaController@agregar');
	Route::get('/categorias', 'CategoriaController@listar');
	Route::get("eliminarCategoria/{id}", "CategoriaController@desactivar");
	Route::get('/categoria/agregar', function(){
	return view('categoriaAgregar');
	});

});

Route::get('/productos', 'ProductoController@listar');
Route::post('/productos/ordenar', 'ProductoController@ordenarProductos');
Route::post('productos/buscar','ProductoController@buscarProductos');
Route::get('/producto/detalle/{id}', 'ProductoController@detalleProducto');
Route::get('/categoria/{id}', 'ProductoController@categoriaShow');

#--------------------------------------------------

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

# ------------------------------



