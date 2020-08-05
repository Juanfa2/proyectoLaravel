@extends("layout")

@section("titulo")
	Home
@endsection


@section("contenido")

<div class="row">

	@if(isset($producto))

	<div class="card col-xs col-sm col-md-8 col-lg-5 p-0 mr-1 mb-1 " style="width: 17rem;">

            <h3>Detalle de producto</h3>
            @if($producto["foto"] != null)

            <img src="/storage/fotoProducto/{{$producto->foto}}" class="card-img-top" alt="image-product">
            @else
              <img src="{{asset('unnamed.png')}}" class="card-img-top" alt="image-product">
            @endif
            <div class="card-body">
              <div class="card-header">{{$producto["nombre"]}}</div>
              <h5 class="card-title">Precio: ${{$producto["precio"]}}</h5>
              @if($producto->stock > 0)
              <p class="card-text bg-success ">En Stock</p>
              @else
              <p class="card-text bg-danger ">Sin Stock</p>
              @endif
              <p class="card-text">{{$producto->descripcion}}</p>

            </div>


         </div>
         <div class= "float-right">
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
                
                @if(Auth::user())
                <a href="{{ url("/addToCart/$producto->idProducto") }}" class="btn btn-primary">Agregar al carrito</a>
                @else
                <a href="#" class="btn btn-primary emergent" onclick="emergente()">Comprar</a>
                @endif
                @endif
                
              @endif

          </div>
    @else
		<p>No se encontro el producto</p>
	@endif  
</div>
	    






@endsection