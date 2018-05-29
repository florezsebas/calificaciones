@section('content')
<h2>Crear nuevo periodo</h2> <br>

{!! Form::open() !!}
    <div class="form-group">
        {!! Form::label('nombre', 'Nombre') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre del periodo', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('hora_inicio', 'Fecha de inicio') !!}
        {!! Form::date('hora_inicio', null, ['class' => 'form-control', 'placeholder' => 'HH:MM:SS', 'required']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('hora_fin', 'fecha de finalizacion')!!}
        {!! Form::date('hora_fin', null, ['class' => 'form-control', 'placeholder' => 'HH:MM:SS', 'required']) !!}
    </div>
    {!! Form::submit('Agregar periodo', ['class' => 'btn btn-primary']) !!}
    <a href="" class="btn btn-primary">Cancelar</a>
{!! Form::close() !!}
@endsection