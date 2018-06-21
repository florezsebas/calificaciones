@extends('layouts.docentes')

@section('content')
<h2>Nueva actividad para el curso {{ $curso->nombre  }} del grado {{$curso->grupo->grado->nombre }} {{$curso->grupo->nombre}} Jornada {{$curso->grupo->grado->jornada->nombre}} </h2>
<br>
{!! Form::open(['route' => ['actividades.store', $periodo_id, $curso], 'method' => 'post']) !!}
  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('nombre', 'Nombre') !!}
      {!! Form::text('nombre', null, ['class' => 'form-control','placeholder' => 'Nombre de la actividad', 'required']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('porcentaje', 'Porcentaje') !!}
      {!! Form::number('porcentaje', null, ['class' => 'form-control', 'step' => "0.01",'placeholder' => 'Porcentaje', 'min'=>'0.01', 'max'=>$porcentaje_disp, 'required' ]) !!}
    </div>
  </div>
{!! Form::submit('Agregar actividad', ['class' => 'btn btn-primary']) !!}
<a href="{{ route('actividades.list',[$periodo_id,$curso->id]) }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection