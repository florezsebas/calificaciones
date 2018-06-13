<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name', 'Portal docentes') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<body>
    <!--  barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!-- menu desplegable-->
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="" onclick=""></a>
                <form id="logout-form" action="" method="POST" style="display: none;">
                @csrf
                </form>
            </div>
        </li>
    </nav>

    <main class="py-4">
        <div class="container" id="app">
            <div class="row">
                <!--  barra lateral izquierda -->
                <div class="col-lg-3 sidebar">
                    <nav class="nav flex-column">
                        <ul class="list-group">
                            <a href="{{ url('docentes/grupos') }}" type="button" class="list-group-item list-group-item-action">Grupos</a>
                            <a href="{{ url('docentes/contrasena') }}" type="button" class="list-group-item list-group-item-action">Cambio de contraseña</a>
                        </ul>
                    </nav>
                </div>
                
        
                <div class="col-lg-9 content">
                    @include('flash::message')
                    @yield('content')
                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    @yield('scripts')
</body>
</html>
