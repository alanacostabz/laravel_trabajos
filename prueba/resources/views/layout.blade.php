<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="{{mix('css/app.css')}}">
  <script src="{{mix('js/app.js')}}" defer></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mi sitio</title>
</head>
<body>
  <header>
    <?php function activeMenu($url) {
      return request()->is($url) ? 'active' : '';
    } ?>
    {{-- <h1>{{request()->is('/') ? 'Éstas en el home' : 'No estás en el home'}}</h1> --}}
    
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark mb-3">
       <div class="container">
          <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation"></button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item {{activeMenu('/')}}">
                    <a class="nav-link" href="{{route('home')}}">Inicio</a>
                </li>
                <li class="nav-item {{activeMenu('saludos*')}}">
                    <a class="nav-link" href="{{route('saludos', 'Bryan')}}">Saludos</a>
                </li>
                <li class="nav-item {{activeMenu('messages/create')}}">
                  <a class="nav-link" href="{{route('messages.create')}}">Contactos</a>
                </li>
                @auth
                  <li class="nav-item {{activeMenu('messages*')}}">
                    <a class="nav-link" href="{{route('messages.index')}}">Mensajes</a>
                  </li>
                  @if (auth()->user()->hasRoles(['admin']))
                    <li class="nav-item {{activeMenu('users*')}}">
                      <a class="nav-link" href="{{route('users.index')}}">Usuarios</a>
                    </li>
                  @endif
                @endauth
            </ul>

            <ul class="navbar-nav ml-auto">
              @auth
                  <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{auth()->user()->name}}
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/users/{{auth()->id()}}/edit">Mi cuenta</a>
                    <a class="dropdown-item" href="/logout">Cerrar Sesión</a>
                </li>
                @else
                  <li class="nav-item pull-right {{activeMenu('login')}}">
                    <a class="nav-link" href="/login">Login</a>
                   
                  </li>
                @endauth
            </ul>
        </div>
       </div>
    </nav>    
  </header>
  <div class="container">
    @yield('content')
    <footer>Copyright &copy; {{date('Y')}}</footer>
  </div>
  <script src="/all/app.js"></script>
</body>
</html>