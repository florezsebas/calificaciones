@extends('layouts.docentes')

@section('content')
<h2>Editar observación</h2> <br>
{!! Form::open(['route' => ['observaciones.update', $observacion], 'method' => 'put']) !!}

  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('periodo_id', 'Periodo') !!}
      {!! Form::select('periodo_id', $periodos, $observacion->periodo_id, ['class' => 'form-control','placeholder' => 'Seleccione periodo', 'required']) !!}
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('titulo', 'Título') !!}
      {!! Form::text('titulo', $observacion->titulo, ['class' => 'form-control','placeholder' => 'Titulo', 'required']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('fecha_digitacion', 'Fecha') !!}
      {!! Form::date('fecha_digitacion', $observacion->fecha_digitacion, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
    </div>
  </div>
  <div>
    {!! Form::label('descripcion', 'Descripción') !!}
  </div>
  <div class="form-group">
    {!! Form::textarea('descripcion', $observacion->descripcion, ['class' => 'form-control', 'required']) !!}
  </div>
  {!! Form::submit('Editar observación', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('observaciones.listar', [$curso->id, $estudiante->user_id]) }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection