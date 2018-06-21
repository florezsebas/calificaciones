@extends('layouts.docentes')

@section('content')
<h2>Actividades del curso {{ $curso->nombre  }} del grado {{$curso->grupo->grado->nombre }} {{$curso->grupo->nombre}} Jornada {{$curso->grupo->grado->jornada->nombre}} </h2>
<br>
<a href="{{ route('actividades.create',[$periodo_id, $curso->id]) }}" class="btn btn-primary" style="margin-bottom:1em">Nueva actividad</a>
<a href="{{ route('actividades.cursos', $periodo_id) }}" class="btn btn-primary" style="margin-bottom:1em">Atrás</a>
<!-- Tabla que lista las actividades -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Porcentaje</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($actividades as $actividad)
        <tr>
          <td>{{ $actividad->nombre }}</td>
          <td>{{ $actividad->porcentaje }}</td>
          <td>
              <a href="{{ route('actividades.edit', $actividad->id)  }}" class="btn btn-primary btn-sm pull-left">Editar</a>
              <a href="{{ route('actividades.destroy', $actividad->id) }}" onClick="return confirm('¿Está seguro que desea eliminar la actividad {{ $actividad->nombre }}?')" class="btn btn-danger btn-sm pull-left">Eliminar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>
@endsection
