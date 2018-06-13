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
        {!! Form::select('docente_id', $docentes, $selected=null, ['class' => 'form-control','placeholder' => 'Profesor a cargo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grado_id', 'Grado') !!}
        {!! Form::select('grado_id', $grados, $selected=null, ['class' => 'form-control','placeholder' => 'Grado', 'required', 'id' => 'grado']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grupo_id', 'Grupo') !!}
        {!! Form::select('grupo_id', [], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione el grupo', 'required', 'id' => 'grupo']) !!}
    </div>
    {!! Form::submit('Agregar curso', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cursos.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
{{ Html::script('js/cursos/desplegarGrupos.js'),array(),true }}
@endsection