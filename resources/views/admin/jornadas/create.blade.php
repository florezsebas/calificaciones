@extends('layouts.admin')

@section('content')
<h2>Nueva jornada</h2> <br>
{!! Form::open(['route' => 'jornadas.store']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre de la jornada', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('hora_inicio', 'Hora de inicio') !!}
        {!! Form::time('hora_inicio', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('hora_fin', 'Hora de finalización') !!}
        {!! Form::time('hora_fin', null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Agregar jornada', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('jornadas.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection