@extends('layouts.acudientes')

@section('content')
<h2>Observaciones del curso {{ $curso->nombre }} grado {{ $curso->grupo->grado->nombre }} grupo {{ $curso->grupo->nombre }} </h2>
<br>

<!-- Tabla que muestra las observaciones de un estudiante asociados a un curso -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Titulo</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($observaciones as $observacion)
      <tr>
        <td>{{ $observacion->titulo }}</td>
        <td>
          <a href="{{ route('observaciones.descripcion', [$curso->id, $observacion->id]) }}" class="btn btn-primary btn-sm pull-left">Ver</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br><br><br>
</div>
@endsection
