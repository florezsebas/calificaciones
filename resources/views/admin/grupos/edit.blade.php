@extends('layouts.admin')

@section('content')
<h2>Editar grupo</h2> <br>
{!! Form::open(['route' => ['grupos.update', $grupo], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', $grupo->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre del grupo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('jornada_id', 'Jornada') !!}
        {!! Form::select('jornada_id', $jornadas, $selected=$grupo->jornada->id, ['class' => 'form-control','placeholder' => 'Seleccione una jornada', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grado_id', 'Grado') !!}
        {!! Form::select('grado_id', $grados, $selected=$grupo->grado->id, ['class' => 'form-control','placeholder' => 'Seleccione un grado', 'required']) !!}
    </div>
    {!! Form::submit('Agregar grupo', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('grupos.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}

@endsection