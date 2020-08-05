@extends('layout')



@section("titulo")
Responder
@endsection


@section("titulo principal")
Conteste las ultimas preguntas
@endsection

@section("contenido")
<div class="">
    <form class="form-signin" action="{{url('/preguntas/guardarRespuesta')}}" method="POST" enctype="multipart/form-data">
      @csrf
    <div class="">
      <ul>
      @forelse ($preguntas as $pregunta)
        <li>
        <p><h2>{{$pregunta["titulo"]}}</h2></p>
          <h3>{{$pregunta["pregunta"]}}</h3>
          <h3>{{$pregunta["respuesta"]}}</h3>
          <div class="">
          <label for="inputRespuesta" class="sr-only">Respuesta:</label>
          <textarea id="inputRespuesta" name="respuesta[]" rows="8" cols="80" placeholder="Deje aqui si respuesta"></textarea>


          </div>
        </li>
      @empty
        <p>no hay preguntas</p>
      @endforelse
      </ul>
    </div>
    <input type="submit" name="" value="Guardar Respuesta">
  </form>

  </div>
@endsection
