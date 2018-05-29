@extends('layouts.admin')

@section('content')
<h2>Crear nuevo curso</h2> <br>
{!! Form::open() !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del curso', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('profesor_id', 'Docente') !!}
        {!! Form::select('profesor_id', $docente=['10' => 'Edgar Trujillo'], $selected=null, ['class' => 'form-control','placeholder' => 'Profesor a cargo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grupo_id', 'Grupo') !!}
        {!! Form::select('grupo_id', $grupos=['10' => 'Septimo A'], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione el grupo', 'required']) !!}
    </div>
    {!! Form::submit('Agregar grupo', ['class' => 'btn btn-primary']) !!}
    <a href="" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}

@endsection