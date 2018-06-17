@extends('layouts.docentes')

@section('content')
<h2>Estudiante {{ $estudiante->user->apellidos }} {{ $estudiante->user->nombres }} del grado {{$curso->grupo->grado->nombre }} {{$curso->grupo->nombre}} Jornada {{$curso->grupo->grado->jornada->nombre}} </h2>
<a href="{{ route('observaciones.crear', [$curso->id, $estudiante->user_id]) }}" class="btn btn-primary btn-sm pull-left">Agregar observacion</a><br> <br>

<!-- Tabla que muestra los estudiantes -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titulo</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($observaciones as $observacion)
        <tr>
          <td>{{ $observacion->id }}</td>
          <td>{{ $observacion->titulo }}</td>
          <td>
              <a href="{{ route('observaciones.editar', $observacion->id) }}" class="btn btn-primary btn-sm pull-left">Editar</a>
              <a href="{{ route('observaciones.destruir', $observacion->id) }}" class="btn btn-danger btn-sm pull-left">Eliminar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

@endsection

