@extends('layout')



@section("titulo")
Contactenos

@endsection


@section("titulo principal")
Contactenos

@endsection


@section("contenido")

<div class ="row justify-content-md-center mt-4">
  <div class="col-lg-4 col-md-6 col-xs-12 ">
    <h2 class="form-signin-heading">Dejenos su mensaje</h2>
    <form class="form-signin" action="{{url('/contacto/agregar')}}" method="POST" enctype="multipart/form-data">
     @csrf
     <div class="form-group">
       <label for="inputNombre" class="sr-only">Nombre</label>
       <input type="text" id="inputNombre" class="form-control mb-4" name="nombre" placeholder="Nombre"  value="{{ old("nombre") }}">
       @if ($errors->has("nombre"))
       <small  class="text-danger">{{ $errors->first("nombre") }} </small>
       @endif
     </div>

     <div class="form-group">
       <label for="inputEmail" class="sr-only">email</label>
       <input type="text" id="inputEmail" class="form-control mb-4" name="email" placeholder="E-mail"  value="{{ old("email") }}">
       @if ($errors->has("email"))
       <small  class="text-danger"> {{ $errors->first("email") }}</small>
       @endif
     </div>

     <div class="form-group">
       <label for="inputCelular" class="sr-only">celular</label>
       <input type="text" id="inputCelular" class="form-control mb-4" name="celular" placeholder="celular"  value="{{ old("celular") }}">
       @if ($errors->has("celular"))
       <small  class="text-danger"> {{ $errors->first("celular") }}</small>
       @endif
     </div>

     <div class="form-group">
      <label for="inputMensaje" class="sr-only">mensaje</label>
      <textarea id="inputMensaje" name="mensaje" value="" class="md-textarea form-control" placeholder="Deja tu mensaje aqui" rows="3" ></textarea>
      <small  class="text-danger"> </small>

    </div>
    <input type="submit" name="" value="enviar">

  </form>

</div>
</div>


@endsection
