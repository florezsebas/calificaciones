@extends('layouts.admin')

@section('content')
<h2>Gestion de periodos</h2> <br>
<a href="{{ route('periodos.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo periodo</a>

<!-- Tabla que muestra los periodos -->
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Fecha de inicio</th>
      <th scope="col">Fecha de finalizacion</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($periodos as $periodo)
      <tr>
        <td>{{ $periodo->id }}</td>
        <td>{{ $periodo->Nombre }}</td>
        <td>{{ $periodo->fecha_inicio }}</td>
        <td>{{ $periodo->fecha_fin }}</td>
        <td>
            <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-primary btn-xs pull-left">Editar</a>
            <a href="{{ route('grupos.destroy', $grupo->id) }}" class="btn btn-danger btn-xs pull-left">Eliminar</a></td>
        </td>
    @endforeach
      </tr>
  </tbody>
</table>

@endsection
