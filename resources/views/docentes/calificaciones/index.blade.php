@extends('layouts.docentes')

@section('content')
<h2>Calificaciones</h2> <br>

<!-- Tabla que muestra los cursos -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Jornada</th>
        <th scope="col">Nombre</th>
        <th scope="col">Docente</th>
        <th scope="col">Grado:Grupo</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cursos as $curso)
        <tr>
          <td>{{ $curso->id }}</td>
          <td>{{ $curso->grupo->grado->jornada->nombre }}</td>
          <td>{{ $curso->nombre }}</td>
          <td>{{ $curso->docente->user->nombres }}</td>
          <td>{{ $curso->grupo->grado->nombre . " : "  . $curso->grupo->nombre }}</td>
          <td>
              <a href="{{ route('calificaciones.actividades.list', $curso->id) }}" class="btn btn-primary btn-sm pull-left">Ver actividades</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>
@endsection
