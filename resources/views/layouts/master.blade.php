<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Blockbuster</title>
        <link rel="shortcut icon" sizes="60x60" href="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png">
        <link rel="icon" type="image/png" sizes="60x60" href="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png">
        <!-- Fonte GoogleApis - utilizar fontes do google -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Fonte FontAwesome - utilizar ícones -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <!-- Importando Bootstrap CSS -->
        <link rel="stylesheet" href="{{url('css/app.css')}}">
        <!-- Importando Bootstrap JS -->
        <script src="{{ url('js/app.js') }}"></script>
    </head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="#">
                <img src="https://cdn.iconscout.com/icon/free/png-256/laravel-226015.png" width="30" height="30" class="d-inline-block mr-2" alt="Laravel">
                Blockbuster DH
            </a>
            @guest
                <ul class="navbar-nav flex-row mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('welcome') }}" class="nav-link pr-2">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('catalogoFilmes') }}" class="nav-link pr-2">Cátalogo de Filmes</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link pr-2">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link pr-2">{{ __('Cadastro') }}</a>
                        </li>
                    @endif
                </ul>
            @else
                <ul class="navbar-nav flex-row mr-auto">
                    <li class="nav-item">
                        <a href="{{ route('welcome') }}" class="nav-link pr-2">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('filmes') }}" class="nav-link pr-2">Filmes</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('filme-adicionar') }}" class="nav-link pr-2">Cadastrar Filme</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('catalogoFilmes') }}" class="nav-link pr-2">Gêneros</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('genero-adicionar') }}" class="nav-link pr-2">Cadastrar Gêneros</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('atores') }}" class="nav-link pr-2">Atores</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('ator-adicionar') }}" class="nav-link pr-2">Cadastrar Atores</a>
                    </li>
                </ul>
                <ul class="navbar-nav flex-row ml-auto">
                    <li class="nav-item">
                        <a class="nav-link pr-4" href="">
                            Olá {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                            {{ __('Sair') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            @endguest
        </nav>
    </header>
    <main class="container my-5">
        @yield('content')
    </main>
</body>
</html>
