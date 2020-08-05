@extends("layout")
@section("links")
	<link rel="stylesheet" href="css/contacto.css">
@endsection

@section("titulo")
Contacto
@endsection

@section("contenido")

<form id="contact" action="/contacto/agregar" method="post">  </form>
	@csrf

@endsection
