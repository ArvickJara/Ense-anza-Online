<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    SDKSDK
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    @auth
                            
                            @if(Auth::user()->role == 'profesor')                        
                                <li class="nav-item">
                                    <a class="nav-link" href="/cursos/create">crear cursos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/cursos">eliminar cursos</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/cursos">editar cursos</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('subscription.show') }}">Suscripción</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/cursosInscritos">Cursos Inscritos</a>
                                </li>
                            @endif
                        @endauth
                    </ul>
                    <form class="d-flex" action="{{ route('curso.search') }}" method="GET">
                        <input class="form-control me-2" type="search" name="name" placeholder="Buscar cursos" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <!-- Banner de bienvenida -->
                <div class="jumbotron text-center">
                    <h1 class="display-4">Bienvenido a la Plataforma de Cursos Online</h1>
                    <h3>SDKSDK tu mejor opción</h3>
                    <p class="lead">Explora una amplia variedad de cursos y mejora tus habilidades.</p>
                </div>

                <!-- Lista de Cursos -->
                <h1>Lista de Cursos</h1>
                <div class="row">
                    @foreach($cursos as $curso)
                        <div class="col-md-4">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $curso->nombre }}</h5>
                                    <p class="card-text">{{ $curso->descripcion }}</p>
                                    @auth
                                        <a href="{{ url('/cursos/' . $curso->id) }}" class="btn btn-primary">Ver más</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-primary">Ver más</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>
    </div>
</body>
</html>
