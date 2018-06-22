@extends('layouts.admin')

@section('content')
<h2>Gestión de cuentas tipo estudiante</h2> <br>
<p style="color:red; font-size:15px;" >
  Recuerde que la contraseña de cada nuevo usuario que cree, inicialmente será la
  fecha de nacimiento que usted digite. <br>
  Tener en cuenta el formato yyyymmdd a la hora de ingresar la contraseña
</p>
<a href="{{ route('estudiantes.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo estudiante</a>

<!-- Tabla que muestra las jornadas -->
<div class="table-responsive">
    <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Nombres</th>
        <th scope="col">Apellidos</th>
        <th scope="col">Fecha de nacimiento</th>
        <th scope="col">Correo</th>
        <th scope="col">Tipo</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($users as $user)    
        <tr>
          <td>{{ $user->codigo }}</td>
          <td>{{ $user->nombres }}</td>
          <td>{{ $user->apellidos }}</td>
          <td>{{ date("d/m/Y", strtotime($user->fecha_nacimiento)) }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->tipo }}</td>
          <td>
              <a href="{{ route('estudiantes.edit', $user->id) }}" class="btn btn-primary btn-sm pull-left">Editar</a>
              <a href="{{ route('estudiantes.destroy', $user->id) }}" onClick="return confirm('¿Está seguro que desea eliminar la cuenta estudiante de {{ $user->nombres }}?, esto podría implicar la eliminación en cascada de otros elementos que dependan de este registro (Ejemplo: observaciones y notas del estudiante)')" class="btn btn-danger btn-sm pull-left">Eliminar</a></td>
          </td>
      @endforeach    
        </tr>
    </tbody>
    {!! $users->render() !!}
  </table>
</div>

@endsection
