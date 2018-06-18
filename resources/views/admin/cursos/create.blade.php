@extends('layouts.admin')

@section('content')
<h2>Crear nuevo curso</h2> <br>
{!! Form::open(['route' => 'cursos.store']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del curso', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('docente_id', 'Docente') !!}
        {!! Form::select('docente_id', $docentes, $selected=null, ['class' => 'form-control','placeholder' => 'Docente a cargo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('jornada_id', 'Jornada') !!}
        {!! Form::select('jornada_id', $jornadas, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione jornada', 'required', 'id' => 'jornada']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grado_id', 'Grado') !!}
        {!! Form::select('grado_id', [], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione grado', 'required','id' => 'grado']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grupo_id', 'Grupo') !!}
        {!! Form::select('grupo_id', [], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione grupo', 'required', 'id' => 'grupo']) !!}
    </div>
    {!! Form::submit('Agregar curso', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cursos.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
{{ Html::script('js/admin/cursos/recursos.js'),array(),true }}
@endsection