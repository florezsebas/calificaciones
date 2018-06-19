<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="../../../../favicon.ico">
    
    <title>Inicio de sesión</title>
    
    <!-- Libreria JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <!--- Boostrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    
    <!-- Custom styles for this template -->
    {{ Html::style('css/login.css', array(), true) }}
</head>
<body>
    <div class="container-fluid">
        <hr>
        @if(session()->has('flash'))
            <div class="alert alert-info">{{ sesion('flash') }}</div>
        @endif
  		<div class="row">
  			<div class="col-sm-4 offset-sm-4">
  				<div class="card">
  					<h4 class="card-header text-center">Inicio de sesión</h4>
  					<div class="card-body">
						<div class="text-center">
							<img src="{{ asset('logo.png') }}" class="rounded" height="100" width="80" alt="image not found">
						</div>
	  					<form method="POST" action="{{ route('login') }}">
	  					    {{ csrf_field() }}
	  						<div class="form-group">
	  							<label for="email">Correo</label>
	  							<input class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="Ingresa tu correo">
	  							<div class="invalid-feedback">{!! $errors->first('email', '<span class="help-block">:message</span>') !!}</div>
	  						</div>
	  						<div class="form-group">
	  							<label for="password">Contraseña</label>
	  							<input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" placeholder="Ingresa tu contraseña">
	  							<div class="invalid-feedback">{!! $errors->first('password', '<span class="help-block">:message</span>') !!}</div>
	  						</div>
	  						<button class="btn btn-success btn-block">Acceder</button>
	  					</form>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
</body>
</html>