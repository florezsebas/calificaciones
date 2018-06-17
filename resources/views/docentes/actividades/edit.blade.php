@extends('layouts.docentes')

@section('content')
<h2>Editar actividad</h2> <br>
{!! Form::open(['route' => ['actividades.update', $actividad], 'method' => 'put']) !!}
  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('nombre', 'Nombre') !!}
      {!! Form::text('nombre' , $actividad->nombre, ['class' => 'form-control','placeholder' => 'Nombre de la actividad', 'required']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('porcentaje', 'Porcentaje') !!}
      {!! Form::number('porcentaje', $actividad->porcentaje, ['class' => 'form-control', 'step' => "0.01",'placeholder' => 'Porcentaje','min'=>'0', 'max'=>$porcentaje_disp, 'required']) !!}
    </div>
  </div>
{!! Form::submit('Editar actividad', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection