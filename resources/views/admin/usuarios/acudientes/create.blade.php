@extends('layouts.admin')

@section('content')

<h2>Nuevo Acudiente</h2><br>
{!! Form::open(['route'=>'acudientes.store']) !!} 
    <div class="form-group">
        {!! Form::label('codigo', 'Documento de identidad') !!}
        {!! Form::number('codigo', null, ['class' => 'form-control', 'placeholder' => 'Numero de documento', 'required', 'pattern' => '^[0-9]+', 'min' => '0'] ) !!}
    </div>
    <div class="form-group">
        {!! Form::label('nombres', 'Nombre') !!}
        {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nombres del acudiente', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('apellidos', 'Apellidos') !!}
        {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos del acudiente', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
        {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Correo') !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@dominio.com', 'required']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit('Crear cuenta', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('acudientes.index') }}" class="btn btn-primary">Cancelar</a>
    </div>
{!! Form::close() !!}    

@endsection