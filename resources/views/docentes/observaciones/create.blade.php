@extends('layouts.docentes')

@section('content')
<h2>Nueva observación</h2> <br>
{!! Form::open(['route' => ['observaciones.store', $curso, $estudiante], 'method' => 'post']) !!}
  
  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('periodo_id', 'Periodo') !!}
      {!! Form::select('periodo_id', $periodos, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione periodo', 'required']) !!}
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('titulo', 'Título') !!}
      {!! Form::text('titulo', null, ['class' => 'form-control','placeholder' => 'Titulo', 'required']) !!}
    </div>
    <div class="form-group">
      {!! Form::label('fecha_digitacion', 'Fecha') !!}
      {!! Form::date('fecha_digitacion', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
    </div>
  </div>

  <div> {!! Form::label('descripcion', 'Descripción') !!} </div>
  <div class="form-group">
    {!! Form::textarea('descripcion', null, $selected=null, ['class' => 'form-control', 'required']) !!}
  </div>

{!! Form::submit('Agregar observación', ['class' => 'btn btn-primary']) !!}
<a href="{{ route('observaciones.listar', [$curso->id, $estudiante->user_id]) }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection