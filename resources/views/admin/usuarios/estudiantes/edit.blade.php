@extends('layouts.admin')

@section('content')
<div class="card">
    <h4 class="card-header"> Editar Estudiante</h4>
    <div class="card-body">
        {!! Form::open(['route'=> ['estudiantes.update', $user], 'method' => 'put' ]) !!} 
            <div class="form-group">
                {!! Form::label('codigo', 'Documento de identidad') !!}
                {!! Form::text('codigo', $user->codigo, ['class' => 'form-control', 'placeholder' => 'Numero de documento', 'required', 'pattern' => '^[0-9]+', 'min' => '0']) !!}
            </div>
            <div class=form-row>
                <div class="form-group col-md-6">
                    {!! Form::label('nombres', 'Nombres') !!}
                    {!! Form::text('nombres', $user->nombres, ['class' => 'form-control', 'placeholder' => 'Nombres del estudiante', 'required']) !!}
                </div>
                <div class="form-group col-md-6">
                    {!! Form::label('apellidos', 'Apellidos') !!}
                    {!! Form::text('apellidos', $user->apellidos, ['class' => 'form-control', 'placeholder' => 'Apellidos del estudiante', 'required']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('fecha_nacimiento', 'Fecha de nacimiento') !!}
                {!! Form::date('fecha_nacimiento', $user->fecha_nacimiento, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo') !!}
                {!! Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'ejemplo@dominio.com', 'required']) !!}
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    {!! Form::label('jornada_id', 'Jornada') !!}
                    {!! Form::select('jornada_id', $jornadas, $user->estudiante->grupo->grado->jornada_id, ['class' => 'form-control','placeholder' => 'Seleccione jornada', 'id' => 'jornada']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('grado_id', 'Grado') !!}
                    {!! Form::select('grado_id', $grados, $user->estudiante->grupo->grado_id, ['class' => 'form-control','placeholder' => 'Seleccione grado', 'id' => 'grado']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('grupo_id', 'Grupo') !!}
                    {!! Form::select('grupo_id', $grupos, $user->estudiante->grupo_id, ['class' => 'form-control','placeholder' => 'Seleccione grupo', 'id' => 'grupo']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('acudiente_id', 'Acudiente a cargo') !!}
                {!! Form::select('acudiente_id', $acudientes, $user->estudiante->acudiente_id, ['class' => 'form-control', 'placeholder' => 'Seleccione un acudiente']) !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('Guardar cambios', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('estudiantes.index') }}" class="btn btn-primary">Cancelar</a>
            </div>
        {!! Form::close() !!} 
        {{ Html::script('js/admin/estudiante/recursos.js'),array(),true }}
    </div>
</div>
@endsection