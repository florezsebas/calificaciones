@extends('layouts.admin')

@section('content')
<h2>Gestión de grados</h2> <br>
<a href="{{ route('grados.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nuevo grado</a>

<!-- Tabla que muestra los grados -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Jornada</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($grados as $grado)
        <tr>
          <td>{{ $grado->nombre }}</td>
          <td>{{ $grado->jornada->nombre}}</td>
          <td>
              <a href="{{ route('grados.edit', $grado->id) }}" class="btn btn-primary btn-sm pull-left">Editar</a>
              <a href="{{ route('grados.destroy', $grado->id) }}" onClick="return confirm('¿Está seguro que desea eliminar el grado {{ $grado->nombre }}?, esto podría implicar la eliminación en cascada de otros elementos que dependan de este registro (Ejemplo: La eliminación de grupos asociados a este grado, así como elementos asociados a los grupos)')"  class="btn btn-danger btn-sm pull-left">Eliminar</a></td>
          </td>
      @endforeach
        </tr>
    </tbody>
     {!! $grados->render() !!}
</table>
</div>

@endsection
