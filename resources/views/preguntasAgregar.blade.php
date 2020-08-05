@extends('layout')



@section("titulo")
Preguntas frecuentes

@endsection


@section("titulo principal")
Preguntas frecuentes

@endsection


@section("contenido")

@forelse ($preguntas as $pregunta)
<div class="accordion" id="{{"accordion" . "$pregunta->id"}}">
	
	<div class="card">
		<div class="card-header" id="{{'heading'. "$pregunta->id"}}">
			<h2 class="mb-0">
				<button class="btn btn-link" type="button" data-toggle="collapse" data-target="{{'#collapse'. "$pregunta->id"}}" aria-expanded="true" aria-controls="{{'collapse'. "$pregunta->id"}}">
					<h3>{{$pregunta["titulo"]}}</h3>
				</button>
			</h2>
		</div>
		<div id="{{'collapse'. "$pregunta->id"}}" class="collapse" aria-labelledby="{{'heading'. "$pregunta->id"}}" data-parent="{{"#accordion". "$pregunta->id"}}">
			<div class="card-body">
				<h4>Pregunta: {{$pregunta["pregunta"]}}</h4>
				<h4>Respuesta: {{$pregunta["respuesta"]}}</h4>
			</div>
		</div>
	</div>
</div>
@empty 
	<p>No hay preguntas</p>
@endforelse







 





  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


@endsection
