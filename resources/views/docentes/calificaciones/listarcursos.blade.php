@extends('layouts.docentes')

@section('content')
<h2>Actividades del curso {{ $curso->nombre  }} del grado {{$curso->grupo->grado->nombre }} {{$curso->grupo->nombre}} Jornada {{$curso->grupo->grado->jornada->nombre}} </h2>
<br>
<a href="{{ route('calificaciones.docentes.index') }}" class="btn btn-primary btn-bg pull-left">Atrás</a>
<br>
<br>
<!-- Tabla que muestra las actividades -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Porcentaje</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($actividades as $actividad)
        <tr>
          <td>{{ $actividad->nombre }}</td>
          <td>{{ $actividad->porcentaje }}</td>
          <td>
              <a href="{{ route('calificaciones.estudiantes.list', [$curso->id, $actividad->id]) }}" class="btn btn-primary btn-sm pull-left">Calificar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>
@endsection
