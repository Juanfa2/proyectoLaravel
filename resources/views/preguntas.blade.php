@extends("layout")
@section("links")

@endsection
@section("titulo")
	F.A.Q
@endsection
{{--preguntasAgregar para agregar, controller para guardar, preguntas.blade para mostrar--}}
@section("contenido")
<form id="preguntas" action="/preguntas/agregar" method="post"></form>
@csrf

           <div class="accordion" id="accordionExample">

              <div class="card">
                <div class="card-header" id="headingOne">
                  <h2 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      asdasdsad
                    </button>
                  </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body">
                    asdasdas
                  </div>
                </div>
              </div>
              

            </div>
@endsection
