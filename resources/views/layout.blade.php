<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="{{asset('css/layout.css')}}">
  @yield("links")
  <title>@yield("titulo")</title>
</head>
<body>
  <div class="class-container">
    <header>
      <nav class="navbar navbar-expand-lg navbar-light b-color ">
        <a class="navbar-brand" href="{{ url('/') }}">E-commerce</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{ url('productos') }}">Nuestros Productos</a>
          </li>

            @auth
           @if (Auth::user()->is_admin)

          <li class="nav-item">
            <a class="nav-link" href="{{ url('producto/agregar') }}">Añadir producto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('categorias') }}">Administrar Categorias</a>
          </li>
          @endif



          @endauth


        </ul>
        <ul class="navbar-nav ml-auto">
          <!-- Authentication Links -->
          @guest
          <li class="nav-item">
            <a class="nav-link" href="{{ url('login') }}">{{ __('Login') }}</a>
          </li>
          @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/register') }}">{{ __('Registro') }}</a>
          </li>
          @endif
          @else
          <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ url('usuario/perfil') }}">Mis datos</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>

          </div>
        </li>

        <div>

          <a class="nav-link" href="{{ url('/carrito') }}">
            <img src="{{asset('shopping-cart.svg')}}" width="25px" height="25px" alt="carrito-icon">
            <span class="badge">{{Session::has('cart') ? Session::get('cart')->totalQty : "" }}</span>
          </a>
        </div>
        @endguest
      </ul>

    </div>
  </nav>
</header>
<div class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4">@yield("titulo principal")</h1>
</div>
<main>

  <div class="container overflow-hidden">

    @yield("contenido")

  </div>
</main>

</div>
<!-- Footer -->
<footer class="page-footer font-small teal pt-4 mt-4 b-color">

  <!-- Footer Text -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase font-weight-bold">About</h5>
        <h2>-------</h2>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita sapiente sint, nulla, nihil
          repudiandae commodi voluptatibus corrupti animi sequi aliquid magnam debitis, maxime quam recusandae
          harum esse fugiat. Itaque, culpa?</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-6 mb-md-0 mb-3 ">

        <!-- Content -->
        <h6 class="text"><a href="{{ url('/contacto') }}" class="nav-link">Contacto</a></h6>
        <h6 class="text"><a class="nav-link" href="{{ url('/preguntas')}}">F.A.Q.</a></h6>
        <h56 class="text"><a class="nav-link" href="#">Reportar problema</a></h6>


      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Text -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2019 Copyright:
    <a href="#"> Grupo3</a>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="/js/main.js"></script>

</body>
</html>
