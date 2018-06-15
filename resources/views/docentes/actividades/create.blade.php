@extends('layouts.docentes')

@section('content')
<h2>Nueva actividad</h2> <br>
{!! Form::open(['route' => ['actividades.store', $curso], 'method' => 'post']) !!}
  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('nombre', 'Nombre') !!}
      {!! Form::text('nombre', null, $selected=null, ['class' => 'form-control','placeholder' => 'Nombre de la actividad', 'required']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('porcentaje', 'Porcentaje') !!}
      {!! Form::number('porcentaje', null, $selected=null, ['class' => 'form-control','placeholder' => 'Porcentaje', 'required']) !!}
    </div>
  </div>
{!! Form::submit('Agregar actividad', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection