@extends('layouts.acudientes')

@section('content')
<h2>Calificaciones estudiante {{ $estudiante->user->nombres }} {{ $estudiante->user->apellidos }}</h2>
<br>
<a href="{{ route('calificaciones.acudientes.index') }}" class="btn btn-primary btn-bg pull-left">Atrás</a>
<br>
<br>
<!-- Tabla que muestra los cursos con sus actividades y calificaciones -->
@foreach($cursos as $curso)
  <div class="table-responsive">
    <h5>Curso: {{ $curso->nombre }}</h5>
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th class="col-8">Actividad</th>
          <th class="col-2">Porcentaje</th>
          <th class="col-2">Nota</th>
        </tr>
      </thead>
      <tbody>
        <?php $promedio = 0.0; ?>
        @foreach($curso->actividades as $actividad)
          <tr>
            <td>{{ $actividad->nombre }}</td>
            <?php
              $nota = $actividad->obtenerCalificacion($estudiante->user_id);
              $porcentaje = $actividad->porcentaje;
              $promedio += $nota * ($porcentaje/100);
              $promedio = number_format((float)$promedio, 1, '.', '');
            ?>
            <td>{{ $porcentaje }}</td>
            <td>{{ $nota }}</td>
          </tr>
        @endforeach
        <h5>Promedio: {{ $promedio }}</h5>
      </tbody>
    </table>
    <br>
  </div>
@endforeach
@endsection
