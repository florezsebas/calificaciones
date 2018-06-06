@extends('layouts.admin')

@section('content')
<h2>Crear nueva jornada</h2> <br>
{!! Form::open(['route' => 'jornadas.store']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la jornada', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('hora_inicio', 'Hora de inicio') !!}
        {!! Form::text('hora_inicio', null, ['class' => 'form-control', 'placeholder' => 'HH:MM:SS']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('hora_fin', 'Hora de finalizacion')!!}
        {!! Form::text('hora_fin', null, ['class' => 'form-control', 'placeholder' => 'HH:MM:SS']) !!}
    </div>
    {!! Form::submit('Agregar jornada', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jornadas.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection