@extends('layouts.admin')

@section('content')
<h2>Editar jornada</h2> <br>
{!! Form::open(['route' =>['jornadas.update', $jornada], 'method'=>'put']) !!}
<div class="form-group">
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', $jornada->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre de la jornada', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('hora_inicio', 'Hora de inicio') !!}
        {!! Form::text('hora_inicio', $jornada->hora_inicio, ['class' => 'form-control', 'placeholder' => 'HH:MM:SS', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('hora_fin', 'Hora de finalización')!!}
        {!! Form::text('hora_fin', $jornada->hora_fin, ['class' => 'form-control', 'placeholder' => 'HH:MM:SS', 'required']) !!}
    </div>
    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jornadas.index') }}" class="btn btn-primary">Cancelar</a>
</div>
{!! Form::close() !!}
@endsection