@extends('layouts.acudientes')

@section('content')
<h2>Calificaciones</h2>
<h4>{{ $estudiante->user->nombres }} {{ $estudiante->user->nombres }}</h4>
<br>
{!! Form::open(['route' => ['calificaciones.list', $user_id], 'method' => 'get']) !!}
<div class="form-row">
  <div class="form-group col-md-3">
    {!! Form::select('periodo_id', $periodos, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione periodo', 'required']) !!}
  </div>
  <div class="form-group col-md-3">
    {!! Form::submit('consultar', ['class' => 'btn btn-primary']) !!}
  </div>
</div>
{!! Form::close() !!}
<a href="{{ route('calificaciones.acudientes.index') }}" class="btn btn-primary btn-bg pull-left">Atrás</a>
<br> <br>
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
        <?php
          $actividades_del_periodo = array();
          foreach($curso->actividades as $actividad)
            if($actividad->periodo_id == $periodo->id)
              $actividades_del_periodo[$actividad->id] = $actividad;
          $promedio = 0.0;
        ?>
        @foreach($actividades_del_periodo as $actividad)
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
