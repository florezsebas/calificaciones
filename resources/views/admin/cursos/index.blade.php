@extends('layouts.admin')

@section('content')
<h2>Gestion de cursos</h2> <br>
<a href="{{ route('cursos.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo curso</a>

<!-- Tabla que muestra las jornadas -->
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Profesor</th>
      <th scope="col">Grupo</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($cursos as $curso)
      <tr>
        <td>{{ $curso->id }}</td>
        <td>{{ $curso->docente->user->nombres }}</td>
        <td>{{ $curso->docente->user->apellidos . $cursos->docente->apellidos}}</td>
        <td>{{ $curso->grupo->nombre }}</td>
        <td>
            <a href="{{ route('cursos.edit','$curso->id') }}" class="btn btn-primary btn-xs pull-left">Editar</a>
            <a href="{{ route('cusos.destroy', $curso->id) }}" class="btn btn-danger btn-xs pull-left">Eliminar</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
