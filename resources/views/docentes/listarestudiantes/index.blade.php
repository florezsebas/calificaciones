@extends('layouts.docentes')

@section('content')
<h2>Listar estudiantes</h2> <br>
{!! Form::open(['route' => 'listar_estudiantes.list']) !!}
  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('jornada_id', 'Jornada') !!}
      {!! Form::select('jornada_id', $jornadas, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione jornada', 'required', 'id' => 'jornada']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('grado_id', 'Grado') !!}
      {!! Form::select('grado_id', [], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione grado', 'required', 'id' => 'grado']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('grupo_id', 'Grupo') !!}
      {!! Form::select('grupo_id', [], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione grupo', 'required', 'id' => 'grupo']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('curso_id', 'Cursos') !!}
      {!! Form::select('curso_id', [], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione curso', 'required', 'id' => 'curso']) !!}
    </div>
  </div>
{!! Form::submit('Aceptar', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
{{ Html::script('js/docente/recursos.js'),array(),true }}
@endsection
