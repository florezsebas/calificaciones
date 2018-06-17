@extends('layouts.docentes')

@section('content')
<h2>Nueva observacion</h2> <br>
{!! Form::open(['route' => ['observaciones.almacenar', $curso, $estudiante], 'method' => 'post']) !!}
  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('titulo', 'Titulo') !!}
      {!! Form::text('titulo', null, ['class' => 'form-control','placeholder' => 'Titulo', 'required']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('periodo', 'Periodo') !!}
      {!! Form::select('periodo', $periodos, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione periodo', 'required']) !!}
    </div>
  </div>
  <div>
    {!! Form::label('descripcion', 'Descripcion') !!}
  </div>
  <div class="form-group">
    {!! Form::textarea('descripcion', null, $selected=null, ['class' => 'form-control','placeholder' => 'Descripcion', 'required']) !!}
  </div>
{!! Form::submit('Agregar observacion', ['class' => 'btn btn-primary']) !!}
<a href="{{ route('observaciones.listar', [$curso->id, $estudiante->user_id]) }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection