@extends('layouts.admin')

@section('content')
<div class="card">
    <h4 class="card-header"> Crear nuevo Estudiante</h4>
    <div class="card-body">
        {!! Form::open(['route'=>'estudiantes.store']) !!} 
            <div class="form-group">
                {!! Form::label('codigo', 'Documento de identidad') !!}
                {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Numero de documento', 'required', 'pattern' => '^[0-9]+', 'min' => '0']) !!}
            </div>
            <div class=form-row>
                <div class="form-group col-md-6">
                    {!! Form::label('nombres', 'Nombres') !!}
                    {!! Form::text('nombres', null, ['class' => 'form-control', 'placeholder' => 'Nombres del estudiante', 'required']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('apellidos', 'Apellidos') !!}
                    {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos del estudiante', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
                {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@dominio.com', 'required']) !!}
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    {!! Form::label('jornada_id', 'Jornada') !!}
                    {!! Form::select('jornada_id', $jornadas, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione jornada', 'id' => 'jornada']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('grado_id', 'Grado') !!}
                    {!! Form::select('grado_id', [], null, ['class' => 'form-control','placeholder' => 'Seleccione grado', 'id' => 'grado']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('grupo_id', 'Grupo') !!}
                    {!! Form::select('grupo_id', [], null, ['class' => 'form-control','placeholder' => 'Seleccione grupo', 'id' => 'grupo']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('acudiente_id', 'Acudiente a cargo') !!}
                {!! Form::select('acudiente_id', $acudientes, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un acudiente']) !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('Crear estudiante', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('estudiantes.index') }}" class="btn btn-primary">Cancelar</a>
            </div>
        {!! Form::close() !!}
        {{ Html::script('js/admin/estudiante/recursos.js'),array(),true }}
    </div>
</div>
@endsection