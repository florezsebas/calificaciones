@extends('layouts.acudientes')

@section('content')
<h2>Calificaciones</h2>
<br>
<h4>Estudiantes a cargo</h4>

{!! Form::open(['route' => ['calificaciones.list'], 'method' => 'post']) !!}
<div class="form-row">
  <div class="form-group col-md-3">
    {!! Form::label('periodo_id', 'Periodo') !!}
    {!! Form::select('periodo_id', $periodos, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione periodo', 'required']) !!}
  </div>
  <div class="form-group col-md-3">
    {!! Form::label('user_id', 'Estudiante a cargo') !!}
    {!! Form::select('user_id', $estudiantes, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione estudiante', 'required']) !!}
  </div>
</div>
{!! Form::submit('Consultar', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection
