@extends('layouts.admin')

@section('content')
<h2>Gestion de jornadas</h2> <br>
<a href="{{ route('jornadas.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nueva jornada</a>

<!-- Tabla que muestra las jornadas -->
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Hora de inicio</th>
      <th scope="col">Hora de finalizacion</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach($jornadas as $jornada)
      <tr>
        <td>{{ $jornada->id}}</td>
        <td>{{ $jornada->nombre}}</td>
        <td>{{ $jornada->fecha_inicio}}</td>
        <td>{{ $jornada->fecha_fin}}</td>
        <td>
            <a href="{{ route('jornadas.edit', $jornada->id) }}" class="btn btn-primary btn-xs pull-left">Editar</a>
            <a href="{{ route('jornadas.destroy', $jornada->id) }}" onClick="return confirm('¿Esta seguro que desea eliminar este registro?')" class="btn btn-danger btn-xs pull-left">Eliminar</a></td>
        </td>
    @endforeach
      </tr>
  </tbody>
</table>
@endsection
