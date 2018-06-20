@extends('layouts.docentes')

@section('content')
<h2> Asignar nota a estudiante {{ $estudiante->user->nombres }} {{ $estudiante->user->apellidos }} </h2>
<h4> Curso: {{ $curso->nombre }} del grado {{ $curso->grupo->grado->nombre }} grupo {{ $curso->grupo->nombre  }} jornada {{ $curso->grupo->grado->jornada->nombre }}</h4>

{!! Form::open(['route' => ['calificaciones.store', $curso->id, $act_id, $estudiante->user_id, 'method' => 'post']]) !!}
  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('calificacion', 'Calificación') !!}
      {!! Form::number('valor', $calificacion,['class' => 'form-control','placeholder' => 'Calificación', 'step' => '0.01', 'min' => '0', 'max'=>'5', 'required']) !!}
    </div>
  </div>
{!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
<a href="{{ route('calificaciones.estudiantes.list', [$curso->id ,$act_id]) }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection