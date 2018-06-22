@extends('layouts.admin')

@section('content')
<h2>Gestión de periodos</h2> <br>
<a href="{{ route('periodos.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo periodo</a>

<!-- Tabla que muestra los periodos -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha de finalización</th>
      <th scope="col">Año lectivo</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($periodos as $periodo)
      <tr>
        <td>{{ $periodo->nombre }}</td>
        <td>{{ $periodo->fecha_inicio }}</td>
        <td>{{ $periodo->fecha_fin }}</td>
        <td>{{ $periodo->anyo }}</td>
        <td>
            <a href="{{ route('periodos.edit', $periodo->id) }}" class="btn btn-primary btn-sm pull-left">Editar</a>
            <a href="{{ route('periodos.destroy', $periodo->id) }}" onClick="return confirm('¿Está seguro que desea eliminar el periodo {{ $periodo->nombre }}?, esto podría implicar la eliminación en cascada de otros elementos que dependan de este registro (Ejemplo: La eliminación de todos los cursos asociados al periodo)')" class="btn btn-danger btn-sm pull-left">Eliminar</a></td>
        </td>
    @endforeach
      </tr>
  </tbody>
</table>
</div>
@endsection
