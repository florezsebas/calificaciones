@extends('layouts.acudientes')

@section('content')
<h2>Cursos del estudiante {{ $estudiante->nombres }} {{ $estudiante->apellidos }}</h2>
<br>

<!-- Tabla que muestra los estudiantes asociados al acudiente -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cursos as $curso)
      <tr>
        <td>{{ $curso->nombre }}</td>
        <td>
          <a href="{{ route('observaciones.list', [$curso->id, $estudiante->user_id]) }}" class="btn btn-primary btn-sm pull-left">Observaciones</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br><br><br>
</div>
@endsection
