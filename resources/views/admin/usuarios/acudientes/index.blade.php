@extends('layouts.admin')

@section('content')
<h2>Gestion de acudientes</h2> <br>
<a href="{{ route('acudientes.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo docente</a>

<!-- Tabla que muestra las jornadas -->
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Nombres</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Correo</th>
      <th scope="col">Tipo</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)    
      <tr>
        <td>{{ $user->acudiente->codigo }}</td>
        <td>{{ $user->nombres }}</td>
        <td>{{ $user->apellidos }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->tipo }}</td>
        <td>
            <a href="{{ route('acudientes.edit', $user->id) }}" class="btn btn-primary btn-xs pull-left">Editar</a>
            <a href="{{ route('acudientes.destroy', $user->id) }}" onClick="return confirm('¿Esta seguro que desea eliminar este registro?')" class="btn btn-danger btn-xs pull-left">Eliminar</a></td>
        </td>
    @endforeach    
      </tr>
  </tbody>
  {!! $users->render() !!}
</table>
@endsection