@extends("layout")

@section("links")
<link rel="stylesheet" href="{{asset('css/image.css')}}">
@endsection

  @section("titulo")
    Listado
  @endsection  
        
        @section("titulo principal")
          Categorias
        @endsection 

        
      @section("contenido")

      <div class="row">
         <div class="card col-xs col-sm-11 col-md-10 col-lg-3 p-0 mr-1 mb-1" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title">Categorias</h5>
            <a href="/categoria/agregar" class="btn btn-primary">Agregar Categoria</a>
          </div>
        </div>
        @forelse ($categorias as $categoria ) 
          <div class="card col-xs col-sm-11 col-md-10 col-lg-3 p-0 mr-1 mb-1 " style="width: 17rem;">
            <div class="card-body">
              <div class="card-header">
                <p>{{$categoria["nombre"]}}</p>
                @if($categoria->borrado_logico == 0)
                <a href="eliminarCategoria/{{$categoria->id}}">Desactivar</a>
                @else
                  <a href="eliminarCategoria/{{$categoria->id}}">Activar</a>
                @endif 
            </div>
          </div>

</div>
        @empty
        <p>No hay categorias</p>
        @endforelse

      
      
    </div>

      
    @endsection