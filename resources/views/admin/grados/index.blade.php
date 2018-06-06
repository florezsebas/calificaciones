@extends('layouts.admin')

@section('content')
<h2>Gestion de grados</h2> <br>
<a href="{{ route('grados.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo grado</a>

<!-- Tabla que muestra las jornadas -->
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($grados as $grado)
      <tr>
        <td>{{ $grado->id }}</td>
        <td>{{ $grado->nombre }}</td>
        <td>
            <a href="{{ route('grados.edit', $grado->id) }}" class="btn btn-primary btn-xs pull-left">Editar</a>
            <a href="{{ route('grados.destroy', $grado->id) }}"  class="btn btn-danger btn-xs pull-left">Eliminar</a></td>
        </td>
    @endforeach
      </tr>
  </tbody>
</table>
@endsection
