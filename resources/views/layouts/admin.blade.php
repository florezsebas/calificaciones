<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ config('app.name', 'Portal administrador') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>

<body>
    <!--  barra de navegacion -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <!--  nombre y logo -->
        <!-- <a class="navbar-brand" href="#">Admin IEANC</a>
        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mynavbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        -->
        <!-- opciones de la barra-->
        <!-- <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="#">Documentatios <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
        -->
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
        </div>
    </nav>

    <main class="py-4">
        <div class="container" id="app">
            <div class="row">
                <!--  barra lateral izquierda -->
                <div class="col-lg-3 sidebar">
                    <nav class="nav flex-column">
                        <ul class="list-group">
                            <a href="{{ url('admin/periodos') }}" type="button" class="list-group-item list-group-item-action">Gestionar periodo</a>
                            <a href="{{ url('admin/jornadas') }}" type="button" class="list-group-item list-group-item-action">Gestionar jornadas</a>
                            <a href="{{ url('admin/usuarios/acudientes') }}" type="button" class="list-group-item list-group-item-action">Gestionar usuarios</a>
                            <a href="{{ url('admin/grados') }}" type="button" class="list-group-item list-group-item-action">Gestionar grados</a>
                            <a href="{{ url('admin/grupos') }}" type="button" class="list-group-item list-group-item-action">Gestionar grupos</a>
                            <a type="button" class="list-group-item list-group-item-action">Gestionar cursos</a>
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
