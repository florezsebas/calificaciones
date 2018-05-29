@extends('layouts.admin')

@section('content')
<h2>Crear nuevo grupo</h2> <br>
{!! Form::open() !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del grupo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('jornada_id', 'Jornada') !!}
        {!! Form::select('jornada_id', $jornadas=['1' => 'Tarde'], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione una jornada', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grado_id', 'Grado') !!}
        {!! Form::select('grado_id', $grados=['1' => 'Septimo'], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione un grado', 'required']) !!}
    </div>
    {!! Form::submit('Agregar grupo', ['class' => 'btn btn-primary']) !!}
    <a href="" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}

@endsection