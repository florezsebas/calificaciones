@extends('layouts.admin')

@section('content')
<h2>Nuevo periodo</h2> <br>
{!! Form::open(['route' => 'periodos.store']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del periodo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha_inicio', 'Fecha de inicio') !!}
        {!! Form::date('fecha_inicio', null, ['class' => 'form-control', 'placeholder' => 'HH:MM:SS', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha_fin', 'fecha de finalización')!!}
        {!! Form::date('fecha_fin', null, ['class' => 'form-control', 'placeholder' => 'HH:MM:SS', 'required']) !!}
    </div>
    {!! Form::submit('Crear periodo', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('periodos.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection