@extends("layout")

@section("links")
<link rel="stylesheet" href="css/registro.css">
@endsection

@section("titulo")
Actualizar

@endsection


@section("titulo principal")
Actualizar Datos

@endsection


@section("contenido")
<div class ="row justify-content-md-center mt-4">
      <div class="col-lg-4 col-md-6 col-xs-12 ">
        <form class="form-signin" action="{{ url('usuario/perfil/editar') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" id="inputId" class="form-control mb-4 " name="id" value="{{ Auth::user()->id }}" required autofocus >

          <div class="form-group">
            <label for="inputName" class="sr-only">Nombre</label>


             <input type="text" id="inputName" class="form-control mb-4 " name="name" placeholder="Nombre"  value="{{ Auth::user()->name }}" required autofocus autocomplete="name" >


            
                <small  class="text-danger"></small>  
            

           </div>


         <div class="form-group">
          <label for="inputApellido" class="sr-only">Apellido</label>
            <input type="text" id="inputApellido" class="form-control mb-4 " name="apellido" placeholder="Apellido" value="{{ Auth::user()->apellido }}" autocomplete="apellido" autofocus required >

            
                <small  class="text-danger"></small>  
            
          </div>



        <div class="form-group">
          <label for="inputEmail" class="sr-only">Email</label>

             <input type="email" id="inputEmail" class="form-control mb-4 " name="email" placeholder="Email" value="{{ Auth::user()->email }}" required autofocus autocomplete="email">


              
                <small  class="text-danger"></small>  
            
           </div>

        <div class='container mb-4'>
          <label for="archivo">Cambiar Foto de perfil</label>
          <input type="file" name="archivo">
        </div>


        <button class="btn btn-lg btn-primary btn-block black-background white" type="submit">Actualizar</button>
      </form>
    </div>
  </div>

@endsection