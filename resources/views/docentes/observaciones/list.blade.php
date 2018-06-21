@extends('layouts.docentes')

@section('content')
<h2>Observaciones del estudiante {{ $estudiante->user->apellidos }} {{ $estudiante->user->nombres }} del grado {{$curso->grupo->grado->nombre }} {{$curso->grupo->nombre}} Jornada {{$curso->grupo->grado->jornada->nombre}} </h2>
<br>
<a href="{{ route('observaciones.crear', [$curso->id, $estudiante->user_id]) }}" class="btn btn-primary btn-bg pull-left">Nueva observación</a>
<a href="{{ route('observaciones.estudiantes', $curso->id) }}" class="btn btn-primary btn-bg pull-left">Atrás</a>
<br>
<br>
<!-- Tabla que muestra las observaciones de un estudiante -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Título</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($observaciones as $observacion)
        <tr>
          <td>{{ $observacion->titulo }}</td>
          <td>
              <a href="{{ route('observaciones.show', [$curso->id, $estudiante->user_id, $observacion->id]) }}" class="btn btn-primary btn-sm pull-left">Ver</a>
              <a href="{{ route('observaciones.editar', $observacion->id) }}" class="btn btn-primary btn-sm pull-left">Editar</a>
              <a href="{{ route('observaciones.destruir', $observacion->id) }}" onClick="return confirm('¿Está seguro que desea eliminar la observacion {{ $observacion->titulo }}?')" class="btn btn-danger btn-sm pull-left">Eliminar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

