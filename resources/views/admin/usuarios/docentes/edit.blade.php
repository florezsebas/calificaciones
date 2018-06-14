@extends('layouts.admin')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
<h2>Editar Docente</h2><br>
{!! Form::open(['route'=>['docentes.update', $user], 'method'=>'put']) !!} 
    <div class="form-group">
        {!! Form::label('codigo', 'Documento de identidad') !!}
        {!! Form::number('codigo', $user->docente->codigo, ['class' => 'form-control', 'placeholder' => 'Numero de documento', 'required', 'pattern' => '^[0-9]+', 'min' => '0']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('nombres', 'Nombre') !!}
        {!! Form::text('nombres', $user->nombres, ['class' => 'form-control', 'placeholder' => 'Nombres del docente', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('apellidos', 'Apellidos') !!}
        {!! Form::text('apellidos', $user->apellidos, ['class' => 'form-control', 'placeholder' => 'Apellidos del docente', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
        {!! Form::date('fecha_nacimiento', $user->fecha_nacimiento, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Correo') !!}
        {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'ejemplo@correo.com', 'required']) !!}
    </div>
    <div class='form-group'>
        {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
        <a href="{{ route('docentes.index') }}" class="btn btn-primary">Cancelar</a>
    </div>
{!! Form::close() !!}

@endsection