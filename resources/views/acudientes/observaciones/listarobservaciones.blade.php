@extends('layouts.acudientes')

@section('content')
<h2>Estudiante {{ $estudiante->user->apellidos }} {{ $estudiante->user->nombres }}</h2>
<h2>Observaciones curso {{ $curso->nombre }} grado {{ $curso->grupo->grado->nombre }} grupo {{ $curso->grupo->nombre }} </h2>
<a href="{{ route('observaciones.cursos',[$curso->periodo_id,$estudiante->user_id,$dont_use_request]) }}" class="btn btn-primary btn-bg pull-left">Atrás</a>
<br>
<br>

<!-- Tabla que muestra las observaciones de un estudiante asociados a un curso -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Título</th>
        <th scope="col">Fecha digitación</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($observaciones as $observacion)
      <tr>
        <td>{{ $observacion->titulo }}</td>
        <td>{{ $observacion->fecha_digitacion }}</td>
        <td>
          <a href="{{ route('observaciones.descripcion', [$observacion->id, $curso->id, $estudiante->user_id]) }}" class="btn btn-primary btn-sm pull-left">Ver</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br><br><br>
</div>
@endsection
