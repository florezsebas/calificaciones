@extends('layouts.admin')

@section('content')
<h2>Crear nuevo Estudiante</h2><br>
{!! Form::open(['route'=>'estudiantes.store']) !!} 
    <div class="form-group">
        {!! Form::label('codigo', 'Documento de identidad') !!}
        {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Numero de documento', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('nombres', 'Nombre') !!}
        {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nombres del docente', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('apellidos', 'Apellidos') !!}
        {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos del docente', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
        {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Correo') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@correo.com', 'required']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit('Agregar Estudiante', ['class' => 'btn btn-primary']) !!}
        <a href="" class="btn btn-primary">Cancelar</a>
    </div>
{!! Form::close() !!}    

@endsection