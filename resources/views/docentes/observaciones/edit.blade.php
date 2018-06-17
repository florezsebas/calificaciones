@extends('layouts.docentes')

@section('content')
<h2>Editar observacion</h2> <br>
{!! Form::open(['route' => ['observaciones.actualizar', $observacion], 'method' => 'put']) !!}
  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('titulo', 'Titulo') !!}
      {!! Form::text('titulo', $observacion->titulo, ['class' => 'form-control','placeholder' => 'Titulo', 'required']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('periodo', 'Periodo') !!}
      {!! Form::select('periodo', $periodos, $observacion->periodo_id, ['class' => 'form-control','placeholder' => 'Seleccione periodo', 'required']) !!}
    </div>
  </div>
  <div>
    {!! Form::label('descripcion', 'Descripcion') !!}
  </div>
  <div class="form-group">
    {!! Form::textarea('descripcion', $observacion->descripcion, ['class' => 'form-control','placeholder' => 'Descripcion', 'required']) !!}
  </div>
  {!! Form::submit('Editar observacion', ['class' => 'btn btn-primary']) !!}
  <a href="{{ route('observaciones.listar', [$curso->id, $estudiante->user_id]) }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection