@extends('layouts.admin')

@section('content')
<h2>Editar periodo</h2> <br>
{!! Form::open(['route' => ['periodos.update', $periodo], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', $periodo->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre del periodo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha_inicio', 'Hora de inicio') !!}
        {!! Form::date('fecha_inicio', $periodo->fecha_inicio, ['class' => 'form-control', 'placeholder' => 'HH:MM:SS', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha_fin', 'Hora de finalización')!!}
        {!! Form::date('fecha_fin', $periodo->fecha_fin, ['class' => 'form-control', 'placeholder' => 'HH:MM:SS', 'required']) !!}
    </div>
    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('periodos.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection