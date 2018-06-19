@extends('layouts.docentes')

@section('content')
<h2>Estudiantes del curso {{ $curso->nombre  }} del grado {{$curso->grupo->grado->nombre }} {{$curso->grupo->nombre}} Jornada {{$curso->grupo->grado->jornada->nombre}} </h2>
<br>
<h4>Actividad: {{ $actividad->nombre }}</h4>
<br>
{!! Form::open(['route' => ['calificaciones.store', $curso, $actividad], 'method' => 'post']) !!}
@if(count($calificaciones) == 0)
  <div class="form-group col-md-3">
    {!! Form::label('periodo', 'Periodo') !!}
    {!! Form::select('periodo', $periodos, null, ['class' => 'form-control','placeholder' => 'Seleccione periodo', 'required']) !!}
  </div>
@else
  <div class="form-group col-md-3">
    {!! Form::label('periodo', 'Periodo') !!}
    {!! Form::select('periodo', $periodos, $calificaciones[0]->periodo_id, ['class' => 'form-control','placeholder' => 'Seleccione periodo', 'required']) !!}
  </div>
@endif

<!-- Tabla que muestra los estudiantes -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Nombres y apellidos</th>
        <th scope="col">Nota</th>
      </tr>
    </thead>
    @if(count($calificaciones) == 0)
    <tbody>
      @foreach($estudiantes as $estudiante)
        <tr>
          <td>
            {{ $estudiante->user->codigo }}
            <input id="{{ $estudiante->user_id }}" name="codigos[]" type="hidden" value="{{ $estudiante->user_id }}">
          </td>
          <td>{{ $estudiante->user->nombres }}  {{ $estudiante->user->apellidos }}</td>
          <td><input value="0" type="number" name="calificaciones[]" id = "{{ $estudiante->user_id }}" min="0" max="5" step=".01" /></td>
        </tr>
      @endforeach
      @else
      @for($i=0; $i<count($estudiantes); $i++)
        <tr>
          <td>
            {{ $estudiantes[$i]->user->codigo }}
            <input id="{{ $estudiantes[$i]->user_id }}" name="codigos[]" type="hidden" value="{{ $estudiantes[$i]->user_id }}">
          </td>
          <td>{{ $estudiantes[$i]->user->nombres }}  {{ $estudiantes[$i]->user->apellidos }}</td>
          <td><input value="{{ $calificaciones[$i]->valor }}" type="number" name="calificaciones[]" id = "{{ $estudiantes[$i]->user_id }}" min="0" max="5" step=".01" /></td>
        </tr>
      @endfor
    </tbody>
    @endif
  </table>
{!! Form::submit('Calificar', ['class' => 'btn btn-primary']) !!}
<a href="{{ route('calificaciones.actividades.list', $curso->id) }}" class="btn btn-primary btn-bg pull-left">Cancelar</a>
{!! Form::close() !!}
</div>
@endsection
