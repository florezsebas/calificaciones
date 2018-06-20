@extends('layouts.docentes')

@section('content')
<h2>Estudiantes del curso {{ $curso->nombre  }} del grado {{$curso->grupo->grado->nombre }} {{$curso->grupo->nombre}} Jornada {{$curso->grupo->grado->jornada->nombre}} </h2>
<h4>Actividad: {{ $actividad->nombre }} </h4>
<br>
<a href="{{ route('calificaciones.actividades.list', $curso->id) }}" class="btn btn-primary btn-bg pull-left">Atrás</a>
<br> <br>
<!-- Tabla que muestra los estudiantes -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Nombres y apellidos</th>
        <th scope="col">Nota</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($estudiantes as $estudiante)
        <tr>
          <td> {{ $estudiante->user->codigo }}</td>
          <td>{{ $estudiante->user->nombres }}  {{ $estudiante->user->apellidos }}</td>
          <td> {{ $estudiante->obtCalificacion($actividad->id,$curso->id) }}</td>
          <td>
            <a href="{{ route('calificaciones.create', [$curso->id, $actividad->id, $estudiante->user_id]) }}" class="btn btn-primary btn-sm pull-left">Calificar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
{!! Form::close() !!}
</div>
@endsection
