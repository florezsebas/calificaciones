@extends('layouts.admin')

@section('content')
<h2>Editar grupo</h2> <br>
{!! Form::open(['route' => ['grupos.update', $grupo], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', $grupo->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre del grupo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('jornada_id', 'Jornada') !!}
        {!! Form::select('jornada_id', $jornadas, $grupo->grado->jornada_id, ['class' => 'form-control', 'placeholder' => 'Seleccione jornada', 'required', 'id' => 'jornada']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grado_id', 'Grado') !!}
        {!! Form::select('grado_id', $grados, $grupo->grado_id, ['class' => 'form-control','placeholder' => 'Seleccione grado', 'required', 'id' => 'grado']) !!}
    </div>
    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('grupos.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}

{{ Html::script('js/admin/grupos/recursos.js'),array(),true }}
@endsection