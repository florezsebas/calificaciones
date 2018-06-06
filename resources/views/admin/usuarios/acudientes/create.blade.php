@extends('layouts.admin')

@section('content')

@if(count($errors) > 0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach 
        </ul>     
    </div>
@endif

<h2>Crear nuevo Acudiente</h2><br>
{!! Form::open(['route'=>'acudientes.store']) !!} 
    <div class="form-group">
        {!! Form::label('codigo', 'Documento de identidad') !!}
        {!! Form::number('codigo', null, ['class' => 'form-control', 'placeholder' => 'Numero de documento', 'required']) !!}
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
        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@correo.com', 'required']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit('Agregar acudiente', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('acudientes.index') }}" class="btn btn-primary">Cancelar</a>
    </div>
{!! Form::close() !!}    

@endsection