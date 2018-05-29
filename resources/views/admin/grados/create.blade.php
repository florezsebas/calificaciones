@extends('layouts.admin')

@section('content')
<h2>Crear nuevo grado</h2> <br>
{!! Form::open() !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del grado', 'required']) !!}
    </div>
    {!! Form::submit('Agregar grado', ['class' => 'btn btn-primary']) !!}
    <a href="" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection