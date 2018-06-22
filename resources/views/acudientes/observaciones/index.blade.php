@extends('layouts.acudientes')

@section('content')
<h2>Observaciones</h2>

{!! Form::open(['route' => ['observaciones.cursos',0,0,$use_request], 'method' => 'get']) !!}
<div class="form-row">
  <div class="form-group col-md-3">
    {!! Form::select('periodo_id', $periodos, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione periodo', 'required']) !!}
  </div>
    <div class="form-group col-md-3">
    {!! Form::select('user_id', $estudiantes, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione estudiante', 'required']) !!}
  </div>
</div>
{!! Form::submit('consultar', ['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}
@endsection
