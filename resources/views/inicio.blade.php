@extends("layout")

@section("titulo")
	Home
@endsection


@section("contenido")
	<div class="jumbotron jumbotron-fluid">
  		<div class="container">
    		<h1 class="display-4">Bienvenido a cotillon dh @auth {{ Auth::user()->name }} @endauth ! </h1>
    		<p class="lead">Aca vas a encontrar los productos mas variados y al mejor precio :).</p>
  		</div>
	</div>

@endsection