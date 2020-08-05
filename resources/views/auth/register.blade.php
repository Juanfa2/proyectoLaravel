@extends("layout")

@section("links")
<link rel="stylesheet" href="css/registro.css">
@endsection

@section("titulo")
Registro

@endsection


@section("titulo principal")
Registro

@endsection


@section("contenido")
<div class ="row justify-content-md-center mt-4">
      <div class="col-lg-4 col-md-6 col-xs-12 ">
        <form class="form-signin" action="{{ route('register') }}" method="POST" enctype="multipart/form-data" id="formRegistro">
          @csrf

          <div class="form-group">
            <label for="inputName" class="sr-only">Nombre</label>


             <input type="text" id="inputName" class="form-control mb-4 @error('name') is-invalid @enderror" name="name" placeholder="Nombre"  value="{{ old('name') }}" required autofocus autocomplete="name" >


            @error('name')
                <small  class="text-danger">{{ $message }}</small>
            @enderror

           </div>


         <div class="form-group">
          <label for="inputApellido" class="sr-only">Apellido</label>
            <input type="text" id="inputApellido" class="form-control mb-4 @error('apellido') is-invalid @enderror" name="apellido" placeholder="Apellido" value="{{ old('apellido') }}" autocomplete="apellido" autofocus required >

            @error('apellido')
                <small  class="text-danger">{{ $message }}</small>
            @enderror
          </div>



        <div class="form-group">
          <label for="inputEmail" class="sr-only">Email</label>

             <input type="email" id="inputEmail" class="form-control mb-4 @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus autocomplete="email">


              @error('email')
                <small  class="text-danger">{{ $message }}</small>
            @enderror
           </div>



         <div class="form-group">
          <label for="inputPassword" class="sr-only">Contraseña</label>

          <input type="password" id="inputPassword" class="form-control mb-4 @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="new-password" >



          @error('password')
                <small  class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <div class="form-group">
          <label for="password-confirm" class="sr-only">Confirmar Contraseña</label>

          <input type="password" id="password-confirm" class="form-control mb-4"name="password_confirmation" placeholder="Vuelva a escribir la contraseña" required autocomplete="new-password">

        </div>

        <div class='container mb-4'>
          <label for="archivo">Foto de perfil</label>
          <input type="file" name="archivo">
        </div>


        <button class="btn btn-lg btn-primary btn-block black-background white" type="submit" id="enviarForm">Registrarse</button>
      </form>
    </div>
    <script src="/js/validacion_registro.js"></script>
  </div>

@endsection
