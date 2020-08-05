@extends("layout")

@section("titulo")

@endsection

@section("contenido")
<section class="ml-4 mt-4">
		<div class="row pt-4">
			<div class="col-lg-6 col-md-6 col-xs-12 ">
				@if(Session::has('cart') )
				<h2>Productos</h2>
				@foreach(Session::get('cart')->items as $product)
				
				@if($product['item']['foto'] == null)
					<img src="{{asset('unnamed.png')}}" class="img-responsive" width="30%" alt="image-product">
				@else
				<img src="/storage/fotoProducto/{{$product['item']['foto']}}" width="30%" class="img-responsive" alt="image-product">
				@endif
				@endforeach
				@else
				<h4>No has agregado productos al carrito!</h4>
				<a href="#"><img class="img-responsive" src="globos.svg" height="300px" width="220px" alt ="image-producto"></a>

				@endif
			</div>

			<div class="col-lg-5 col-md-5 col-xs-12  mt-4 mr-1">
				<table class="table table-hover table-bordered">
					<tbody>
						<thead>
							<th colspan="2">RESUMEN DE COMPRA</th>
						</thead>
						<tr>
							
							<th>Nombre</th>
							<th>Precio</th>
							<th>Cantidad</th>
						</tr>
						@if(Session::has('cart') )
						@foreach(Session::get('cart')->items as $product)
						<tr>
							
							<td><a href="{{url("producto/detalle/".$product['item']['idProducto'])}}">{{$product["nombre"]}}</a></td>
							<td>${{$product["price"]}}</td>
							<td>{{$product["qty"]}}</td>
							<td>
								<a href="{{url("/removeToCart/".$product['item']['idProducto'])}}">Quitar</a>
							</td>
							
							
						</tr>
						@endforeach
						@endif

						<tr>
							<th scope="row">TOTAL </th>
							@if(Session::has('cart') and (!Session::get('cart')->totalPrice == 0))
							<td>${{Session::has('cart') ? Session::get('cart')->totalPrice : "" }}</td>
							@endif
						</tr>
					</tbody>
				</table>
				<a href="{{url('productos')}}" class="btn btn-primary"> Continuar comprando</a>
				
				<button type="button" class="btn btn-outline-success float-right">Pagar</button>

			</div>
		</div>
		
	</section>


@endsection

