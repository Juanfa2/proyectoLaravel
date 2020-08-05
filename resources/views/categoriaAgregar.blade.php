@extends('layout')



@section("titulo")
Registrar Categoria

@endsection


@section("titulo principal")
Agregar Categoria

@endsection


@section("contenido")

<div class ="row justify-content-md-center mt-4">
  <div class="col-lg-4 col-md-6 col-xs-12 ">
    <h2 class="form-signin-heading">Nueva Categoria</h2>
    <form class="form-signin" action="{{url('categoria/agregar')}}" method="POST" enctype="multipart/form-data">
     @csrf
     <div class="form-group">
       <label for="inputNombre" class="sr-only">Nombre</label>

       <input type="text" id="inputNombre" class="form-control mb-4" name="nombre" placeholder="Nombre"  value="{{ old("nombre") }}">
       @if ($errors->has("nombre"))
       <small  class="text-danger">{{ $errors->first("nombre") }} </small>
       @endif	
     </div>
     <button class="btn btn-lg btn-primary btn-block black-background white" type="submit">Agregar Categoria</button>

  </form>

</div>
</div>   		


@endsection