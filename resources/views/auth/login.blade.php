@extends("layout")

@section("links")
<link rel="stylesheet" href="css/registro.css">
@endsection

@section("titulo")
    Ingresar
@endsection

@section("titulo principal")
    Ingresar
@endsection

@section("contenido")
    <section class="ml-4 mt-4">
      <div class ="row justify-content-md-center mt-4">
        <div class="col-lg-4 col-md-6 col-xs-12 ">


          <h2 class="form-signin-heading">Complete con sus datos</h2>

          <form class="form-signin" id="formLogin" action="{{ route('login') }}" method="post">
            @csrf

            <div class="form-group">
            <label for="inputEmail" class="sr-only">E-mail</label>

              <input id="inputEmail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"autofocus>
              @error('email')
                  <small  class="text-danger" >{{ $message }} </small>
                </span>
              @enderror
            </div>



            <div class="form-group">
              <label for="inputPassword" class="sr-only">Contraseña</label>


              <input id="inputPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña" required autocomplete="current-password">

            @error('password')
                <small  class="text-danger"> {{ $message }} </small>
            @enderror



            </div>


            <div class="checkbox form-group">
              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

              <label  for="remember">
                  {{ __('Recordarme') }}
              </label>
          </div>




            <button class="btn btn-lg btn-primary btn-block black-background white" id="enviarForm" type="submit">{{ __('Entrar') }}</button>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Olvido su contraseña ? ') }}
                </a>
            @endif

            <p>¿ No tenes cuenta ? <a href="{{ url('register') }}">Registrate!</a></p>
          </form>
        </div>
      {{--  <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
--}}    <script src="/js/validacion_login.js"></script>
      </div>
    </section>

@endsection
