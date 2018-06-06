@extends('layouts.admin')

@section('content')
<h2>Gestion de grupos</h2> <br>
<a href="{{ route('grupos.create') }} " class="btn btn-primary" style="margin-bottom:1em">Nuevo grupo</a>

<!-- Tabla que muestra las jornadas -->
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Grado</th>
      <th scope="col">Grupo</th>
      <th scope="col">Jornada</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($grupos as $grupo)
      <tr>
        <td>{{ $grupo->id }}</td>
        <td>{{ $grupo->grado->nombre}}</td>
        <td>{{ $grupo->nombre }}</td>
        <td>{{ $grupo->jornada->nombre  }}</td>
        <td>
            <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-primary btn-xs pull-left">Editar</a>
            <a href="{{ route('grupos.destroy', $grupo->id) }}" class="btn btn-danger btn-xs pull-left">Eliminar</a></td>
        </td>
    @endforeach
      </tr>
  </tbody>
</table>
@endsection
