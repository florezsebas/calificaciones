@extends('layouts.admin')

@section('content')
<h2>Editar curso</h2> <br>
{!! Form::open(['route' => ['cursos.update', $curso], 'method' => 'put']) !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', $curso->nombre, ['class' => 'form-control', 'placeholder' => 'Nombre del curso', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('docente_id', 'Docente') !!}
        {!! Form::select('docente_id', $docentes, $curso->docente_id, ['class' => 'form-control','placeholder' => 'Docente a cargo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('jornada_id', 'Jornada') !!}
        {!! Form::select('jornada_id', $jornadas, $curso->grupo->grado->jornada_id, ['class' => 'form-control','placeholder' => 'Seleccione jornada', 'required', 'id' => 'jornada']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grado_id', 'Grado') !!}
        {!! Form::select('grado_id', $grados, $curso->grupo->grado_id, ['class' => 'form-control','placeholder' => 'Seleccione grado', 'required', 'id' => 'grado']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('grupo_id', 'Grupo') !!}
        {!! Form::select('grupo_id', $grupos, $curso->grupo->id, ['class' => 'form-control','placeholder' => 'Seleccione grupo', 'required', 'id' => 'grupo']) !!}
    </div>
    {!! Form::submit('Editar curso', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('cursos.index') }}" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
{{ Html::script('js/admin/cursos/recursos.js'),array(),true }}
@endsection