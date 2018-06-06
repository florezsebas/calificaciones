@extends('layouts.admin')

@section('content')
<div class="card">
    <h4 class="card-header"> Crear nuevo Estudiante</h4>
    <div class="card-body">
        {!! Form::open(['route'=>'estudiantes.store']) !!} 
            <div class="form-group">
                {!! Form::label('codigo', 'Documento de identidad') !!}
                {!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Numero de documento', 'required']) !!}
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
                {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'ejemplo@correo.com', 'required']) !!}
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    {!! Form::label('jornada_id', 'Jornada') !!}
                    {!! Form::select('jornada_id', $jornadas, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione una jornada']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('grado_id', 'Grado') !!}
                    {!! Form::select('grado', $grados, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione un grado']) !!}
                </div>
                <div class="form-group col-md-4">
                    {!! Form::label('grupo_id', 'Grupo') !!}
                    {!! Form::select('grupo_id', $grupos, $selected=null, ['class' => 'form-control','placeholder' => 'Seleccione un grupo']) !!}
                </div>
            </div>
            <div class="form-group">
                {!! Form::label('codigo_acudiente', 'Acudiente') !!}
                {!! Form::text('codigo_acudiente', null, ['class' => 'form-control', 'placeholder' => 'Numero de documento o nombre', 'required']) !!}
            </div>
            <div class='form-group'>
                {!! Form::submit('Agregar Estudiante', ['class' => 'btn btn-primary']) !!}
                <a href="" class="btn btn-primary">Cancelar</a>
            </div>
        {!! Form::close() !!}  
    </div>
</div>
@endsection