@extends("layout")

@section("titulo")
 Perfil
@endsection

 @section("titulo principal")
          Perfil de usuario
 @endsection 

@section("contenido")

	 <section class="ml-4 mt-4">
    <div class="row ml-4">

      <div class="col-lg-8 col-md-6 col-xs-12 ">
      
      @if(Auth::user()->foto == null )
        <img class="img-responsive" src="{{asset('perfil-user.svg')}}" height="300px" width="220px" alt="perfil">
      @else
       <a href="#"><img class="img-responsive" src="/storage/userFoto/{{ Auth::user()->foto }}" height="300px" width="300" alt ="image-perfil"></a>
      @endif

     </div>
     <div class="col-lg-4 col-md-6 col-xs-12 mt-4">
      <table class="table table-hover table-borderless">
        <h3>Datos de usuario</h3>
        <tbody>
          <tr>
            <th scope="row">Nombre:</th>
            <td>{{ Auth::user()->name }}</td>
          </tr>
          <tr>
            <th scope="row">Apellido:</th>
            <td>{{ Auth::user()->apellido }}</td>
          </tr>
          <tr>
            <th scope="row">Email:</th>
            <td>{{ Auth::user()->email }}</td>
          </tr>
        </tbody>

      </table>
      <a href="perfil/editar" class="btn btn-outline-info">Editar</a>
    </form>
    </div>
  </div>
</section>


@endsection 