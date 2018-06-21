@extends('layouts.docentes')

@section('content')
<h2>Observación {{ $observacion->titulo }} del estudiante {{ $estudiante->user->apellidos }} {{ $estudiante->user->nombres }}</h2> <br>
<h4>Curso: {{ $curso->nombre }}</h4>
<br>
<a href="{{ route('observaciones.listar', [$curso->id, $estudiante->user_id]) }}" class="btn btn-primary">Atrás</a>
<br> <br>
<p> {{ $observacion->descripcion }} </p>
@endsection