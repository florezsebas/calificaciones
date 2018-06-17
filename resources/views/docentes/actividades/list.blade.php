@extends('layouts.docentes')

@section('content')
<h2>Actividades del curso {{ $curso->nombre  }} del grado {{$curso->grupo->grado->nombre }} {{$curso->grupo->nombre}} Jornada {{$curso->grupo->grado->jornada->nombre}} </h2> <br>
<a href="{{ route('actividades.create', $curso->id) }}" class="btn btn-primary" style="margin-bottom:1em">Nueva actividad</a>

<!-- Tabla que muestra las actividades -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Porcentaje</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($actividades as $actividad)
        <tr>
          <td>{{ $actividad->id }}</td>
          <td>{{ $actividad->nombre }}</td>
          <td>{{ $actividad->porcentaje }}</td>
          <td>
              <a href="{{ route('actividades.edit', $actividad->id) }}" class="btn btn-primary btn-sm pull-left">Editar</a>
              <a href="{{ route('actividades.destroy', $actividad->id) }}" class="btn btn-danger btn-sm pull-left">Eliminar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>
@endsection