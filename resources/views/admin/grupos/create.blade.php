@extends('layouts.admin')

@section('content')
<h2>Nuevo grupo</h2> <br>
{!! Form::open(['route' => 'grupos.store']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del grupo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('jornada_id', 'Jornada') !!}
        {!! Form::select('jornada_id', $jornadas, $selected=null, ['class' => 'form-control', 'placeholder' => 'Seleccione jornada', 'required', 'id' => 'jornada']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grado_id', 'Grado') !!}
        {!! Form::select('grado_id', [], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione grado', 'required', 'id' => 'grado']) !!}
    </div>
    {!! Form::submit('Crear grupo', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('grupos.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
{{ Html::script('js/admin/grupos/recursos.js'),array(),true }}
@endsection