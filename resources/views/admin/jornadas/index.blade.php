@extends('layouts.admin')

@section('content')
<h2>Gestión de jornadas</h2> <br>
<a href="{{ route('jornadas.create') }}" class="btn btn-primary" style="margin-bottom:1em">Nueva jornada</a>

<!-- Tabla que muestra las jornadas -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Hora de inicio</th>
        <th scope="col">Hora de finalización</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($jornadas as $jornada)
        <tr>
          <td>{{ $jornada->nombre}}</td>
          <td>{{ $jornada->hora_inicio }}</td>
          <td>{{ $jornada->hora_fin }}</td>
          <td>
              <a href="{{ route('jornadas.edit', $jornada->id) }}" class="btn btn-primary btn-sm pull-left">Editar</a>
              <a href="{{ route('jornadas.destroy', $jornada->id) }}" onClick="return confirm('¿Esta seguro que desea eliminar la jornada {{ $jornada->nombre }}?, esto podría implicar la eliminación en cascada de otros elementos que dependan de este registro (Ejemplo: La eliminación de grados y su vez elementos asociados al grado)')" class="btn btn-danger btn-sm pull-left">Eliminar</a></td>
          </td>
      @endforeach
        </tr>
    </tbody>
  </table>
</div>
@endsection
