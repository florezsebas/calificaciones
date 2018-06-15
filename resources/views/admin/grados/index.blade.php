@extends('layouts.admin')

@section('content')
<h2>Gestion de grados</h2> <br>
<a href="{{ route('grados.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo grado</a>

<!-- Tabla que muestra las jornadas -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Jornada</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($grados as $grado)
        <tr>
          <td>{{ $grado->id }}</td>
          <td>{{ $grado->nombre }}</td>
          <td>{{ $grado->jornada->nombre}}</td>
          <td>
              <a href="{{ route('grados.edit', $grado->id) }}" class="btn btn-primary btn-sm pull-left">Editar</a>
              <a href="{{ route('grados.destroy', $grado->id) }}" onClick="return confirm('¿Esta seguro que desea eliminar este registro?')"  class="btn btn-danger btn-sm pull-left">Eliminar</a></td>
          </td>
      @endforeach
        </tr>
    </tbody>
     {!! $grados->render() !!}
</table>
</div>

@endsection
