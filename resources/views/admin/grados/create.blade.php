@extends('layouts.admin')

@section('content')
<h2>Crear nuevo grado</h2> <br>
{!! Form::open(['route' => 'grados.store']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del grado', 'required']) !!}
    </div>
    {!! Form::submit('Agregar grado', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('grados.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection