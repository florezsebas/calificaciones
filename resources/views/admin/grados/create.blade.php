@extends('layouts.admin')

@section('content')
<h2>Nuevo grado</h2> <br>
{!! Form::open(['route' => 'grados.store']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del grado', 'required']) !!}
    </div>
   <div class="form-group">
        {!! Form::label('jornada_id', 'Jornada') !!}
        {!! Form::select('jornada_id', $jornadas, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione una jornada', 'required']) !!}
    </div>
    {!! Form::submit('Crear grado', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('grados.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection