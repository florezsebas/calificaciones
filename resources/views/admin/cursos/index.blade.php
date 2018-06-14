@extends('layouts.admin')

@section('content')
<h2>Gestion de cursos</h2> <br>
<a href="{{ route('cursos.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo curso</a>

<!-- Tabla que muestra las jornadas -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Profesor</th>
        <th scope="col">Jornada</th>
        <th scope="col">Grado:Grupo</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cursos as $curso)
        <tr>
          <td>{{ $curso->id }}</td>
          <td>{{ $curso->nombre }}</td>
          <td>{{ $curso->docente->user->full_name }}</td>
          <td>{{ $curso->grupo->grado->jornada->nombre }}</td>
          <td>{{ $curso->grupo->grado->nombre ." ". $curso->grupo->nombre}}</td>
          <td>
              <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-primary btn-sm pull-left">Editar</a>
              <a href="{{ route('cursos.destroy', $curso->id) }}" class="btn btn-danger btn-sm pull-left">Eliminar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>
@endsection
