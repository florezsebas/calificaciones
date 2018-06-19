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
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Acciones acudientes</a>
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
            <div class="container">
        
                <!-- Barra de navegacion lateral ziquierda -->
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">

                        <ul class="nav flex-column">
                            
                            <li class="nav-item">
                                <a class="nav-link" href="/acudientes">
                                    <span data-feather="home"></span>
                                    Panel acudientes
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('acudientes/calificaciones') }}">
                                    <span data-feather="check-square"></span>
                                    Mostrar calificaciones
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('acudientes/observaciones') }}">
                                    <span data-feather="clipboard"></span>
                                    Mostrar observaciones
                                </a>
                            </li>
                            
                        </ul>
                
                    </div>
                </nav>
            </div>
                
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <!---<h2>Section title</h2>-->
                @include('flash::message')
                @include('template.partials.errors')
                @yield('content')
            </main>

        </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    
    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

</body>
</html>