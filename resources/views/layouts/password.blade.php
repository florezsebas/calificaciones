<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">
    
    <title>{{ config('app.name', 'Portal Acudiente') }}</title>
    
    <!-- Libreria JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!--- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    
    <!-- Hoja de estilos -->
    {{ Html::style('css/dashboard.css', array(), true) }}
</head>

<body>
    
    <!--Barra de navegacion superior-->
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href=""> Cambiar contraseña {{ Auth::user()->tipo}}</a>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <form method="POST" action="{{ route('logout') }}">
                    {{ csrf_field() }}
                    <button class="btn btn-danger btn-sm">Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </nav>
    <div class="container-fluid" id="app">
        <div class="row">
                
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <!---<h2>Section title</h2>-->
                @include('flash::message')
                @include('template.partials.errors')
                @yield('content')
            </main>

        </div>
    </div>
        
    
</body>