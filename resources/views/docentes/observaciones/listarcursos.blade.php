@extends('layouts.docentes')

@section('content')
<h2>Cursos </h2>
<h4>Periodo: {{ $periodo->nombre }}</h4>
<br>
<a href="{{ route('observaciones.index') }}" class="btn btn-primary" style="margin-bottom:1em">Atrás</a>
<br>
<!-- Tabla que muestra los cursos que imparte un docente -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Jornada</th>
        <th scope="col">Nombre</th>
        <th scope="col">Grado : Grupo</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cursos as $curso)
        <tr>
          <td>{{ $curso->grupo->grado->jornada->nombre }}</td>
          <td>{{ $curso->nombre }}</td>
          <td>{{ $curso->grupo->grado->nombre . " : "  . $curso->grupo->nombre }}</td>
          <td>
              <a href="{{ route('observaciones.estudiantes', $curso->id) }}" class="btn btn-primary btn-sm pull-left">Ver estudiantes</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>
@endsection
