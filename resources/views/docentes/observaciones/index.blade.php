@extends('layouts.docentes')

@section('content')
<h2>Grupos</h2> <br>
<!--<a href="{{ route('cursos.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo curso</a>-->
{!! Form::open(['route' => 'cursos.store']) !!}
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
<a href="{{ url('docentes/') }}" class="btn btn-primary ">Cancelar</a>
{!! Form::close() !!}
{{ Html::script('js/docente/recursos.js'),array(),true }}
@endsection
