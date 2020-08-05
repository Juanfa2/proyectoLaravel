@extends("layout")

@section("links")
<link rel="stylesheet" href="{{asset('css/image.css')}}">
@endsection

  @section("titulo")
    Listado
  @endsection  
        
        @section("titulo principal")
          Nuestros Productos
          @if(isset($nombreCate))
          <h3>{{$nombreCate->nombre}}</h3>
          @endif
        @endsection 

        
      @section("contenido")
    
      <div class="float-left mr-4">
      <form class="form-signin" action="{{url('productos/ordenar')}}" method="POST" enctype="multipart/form-data">
        @csrf
        
          <h4>Ordenar por</h4>
          <div class="input-group mb-3">
            <select class="custom-select" id="inputGroupSelect01" name="order">
              <option selected value="none">Seleccione..</option>
              <option value="alto">Precio mas alto</option>
              <option value="bajo">Precio mas bajo</option>
              <option value="alfabetico">Orden alfabetico</option>
            </select>
          </div>
          <button class="btn btn-primary" type="submit">Seleccionar</button>
      </form>

      <h2>Categorias</h2>
      @foreach($categorias as $categoria)
      @if($categoria->borrado_logico == 0)
      <a class="dropdown-item" href="{{url("categoria/$categoria->id") }}">{{$categoria->nombre}}</a>
      @endif
      @endforeach

      <div class="float-left mr-2 mt-4">
          <form class="form-signin " action="{{ url('productos/buscar') }}" method="POST">
            @csrf
        <div class="input-group mb-2">
          <input class="form-control mr-sm-2" type="search" placeholder="Buscar por nombre" id="campo" name="campo" aria-label="Search">
        </div>
          <button class="btn btn-outline-success" type="submit">Buscar Producto</button>
        </form>
      </div>    
    </div>

    

      
      <div class="row">
        @forelse ($productos as $producto ) 
          <div class="card col-xs col-sm-11 col-md-10 col-lg-3 p-0 mr-1 mb-1 " style="width: 17rem;">
            @if($producto["foto"] != null)

            <img src="/storage/fotoProducto/{{ $producto->foto }}" class="" alt="image-product">
            @else
              <img src="{{asset('unnamed.png')}}" class="" alt="image-product">
            @endif
            <div class="card-body">
              <div class="card-header">
                <a href="{{url("producto/detalle/$producto->idProducto") }}">{{$producto["nombre"]}}</a></div>
              <h5 class="card-title">Precio: ${{$producto["precio"]}}</h5>

              


              @if ( Auth::user() and Auth::user()->is_admin ) 
              
              <p>Hay stock de {{$producto->stock}}</p>
               
              <a href="/producto/actualizar/{{ $producto['idProducto']}}" class="btn btn-primary">Modificar</a>


              <form class="form-signin" action="/producto/eliminar" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <input type="hidden" id="inputName" class="form-control mb-4" name="id"  value="{{ $producto["idProducto"]}}">
                  <button class="btn btn-danger mt-4" type="submit">Eliminar</button>
                </div>
              </form>
              @else
                @if($producto->stock > 0)
                <p class="card-text bg-success ">En Stock</p>
                @if(Auth::user())
                <a href="{{ url("/addToCart/$producto->idProducto") }}" class="btn btn-primary">Agregar al carrito</a>
                @else
                <a href="#" class="btn btn-primary emergent" onclick="emergente()">Comprar</a>
                @endif
                @else
                <p class="card-text bg-danger ">Sin Stock</p>
                @endif
                
              @endif

            </div>
          </div>


        @empty
        <p>No hay productos</p>
        @endforelse

      
      </div>
    {{$productos->links()}}
      
    @endsection


