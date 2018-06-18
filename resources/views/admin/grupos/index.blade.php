@extends('layouts.admin')

@section('content')
<h2>Gestión de grupos</h2> <br>
<a href="{{ route('grupos.create') }} " class="btn btn-primary" style="margin-bottom:1em">Nuevo grupo</a>

<!-- Tabla que muestra las jornadas -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Grado</th>
        <th scope="col">Grupo</th>
        <th scope="col">Jornada</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($grupos as $grupo)
        <tr>
          <td>{{ $grupo->grado->nombre}}</td>
          <td>{{ $grupo->nombre }}</td>
          <td>{{ $grupo->grado->jornada->nombre  }}</td>
          <td>
              <a href="{{ route('grupos.edit', $grupo->id) }}" class="btn btn-primary btn-sm pull-left">Editar</a>
              <a href="{{ route('grupos.destroy', $grupo->id) }}" onClick="return confirm('¿Está seguro que desea eliminar el grupo {{ $grupo->nombre }}?')" class="btn btn-danger btn-sm pull-left">Eliminar</a></td>
          </td>
      @endforeach
        </tr>
    </tbody>
    {!! $grupos->render() !!}
  </table>
</div>
@endsection
