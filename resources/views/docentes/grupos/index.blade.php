@extends('layouts.docentes')

@section('content')
<h2>Grupos</h2> <br>
<!--<a href="{{ route('cursos.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo curso</a>-->
{!! Form::open(['route' => 'cursos.store']) !!}
  <div class="form-row">
    <div class="form-group col-md-3">
      {!! Form::label('jornada_id', 'Jornada') !!}
      {!! Form::select('jornada_id', $jornadas, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione la jornada', 'required', 'id' => 'jornada']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('grado_id', 'Grado') !!}
      {!! Form::select('grado_id', [], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione el grado', 'required', 'id' => 'grado']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('grupo_id', 'Grupo') !!}
      {!! Form::select('grupo_id', [], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione el grupo', 'required', 'id' => 'grupo']) !!}
    </div>
    <div class="form-group col-md-3">
      {!! Form::label('curso_id', 'Cursos') !!}
      {!! Form::select('curso_id', [], $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione curso', 'required', 'id' => 'curso']) !!}
    </div>
  </div>
<!--{!! Form::submit('Agregar curso', ['class' => 'btn btn-primary']) !!}-->
<!--<a href="{{ route('docentes.index') }}" class="btn btn-primary">Cancelar</a>-->
{!! Form::close() !!}

<div class="form-row" id="acciones">
  <div class="form-group col-md-3">
    <a href="" class="btn btn-primary">Lista de estudiantes</a>
  </div>
  <div class="form-group col-md-2">
    <a href="" class="btn btn-primary">Actividades</a>
  </div>
  <div class="form-group col-md-2">
    <a href="" class="btn btn-primary">Calificaciones</a>
  </div>
  <div class="form-group col-md-2">
    <a href="" class="btn btn-primary">Observaciones</a>
  </div>
</div>

{{ Html::script('js/docentesGrupos/desplegarGrupos.js'),array(),true }}
@endsection
