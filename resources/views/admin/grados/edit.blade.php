@extends('layouts.admin')

@section('content')
<h2>Editar grado</h2> <br>
{!! Form::open(['route' => ['grados.update', $grado], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', $grado->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre del grado', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('jornada_id', 'Jornada') !!}
        {!! Form::select('jornada_id', $jornadas, $grado->jornada_id, ['class' => 'form-control','placeholder' => 'Seleccione una jornada', 'required']) !!}
    </div>
    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('grados.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection