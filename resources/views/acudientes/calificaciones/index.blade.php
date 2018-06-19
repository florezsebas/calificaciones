@extends('layouts.acudientes')

@section('content')
<h2>Calificaciones</h2>
<br>
<h4>Estudiantes a cargo</h4>

<!-- Tabla que muestra los estudiantes asociados al acudiente -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Apellidos</th>
        <th scope="col">Nombre</th>
        <th scope="col">Código</th>
        <th scope="col">Correo</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($estudiantes as $estudiante)
      <tr>
        <td>{{ $estudiante->user->apellidos }}</td>
        <td>{{ $estudiante->user->nombres }}</td>
        <td>{{ $estudiante->user->codigo }}</td>
        <td>{{ $estudiante->user->email }}</td>
        <td>
          <a href="{{ route('calificaciones.list', $estudiante->user_id) }}" class="btn btn-primary btn-sm pull-left">Calificaciones</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
  <br><br><br>
</div>
@endsection
