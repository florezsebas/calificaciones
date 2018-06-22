@extends('layouts.acudientes')

@section('content')
<h2>Estudiantes a cargo</h2>
<br>
<table class="table table-striped table-sm">
  <thead>
    <tr>
      <th scope="col">Apellidos</th>
      <th scope="col">Nombres</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($estudiantes as $estudiante)
      <tr>
        <td>{{ $estudiante->user->apellidos }}</td>
        <td>{{ $estudiante->user->nombres }}</td>
        <td>
            <a href="{{ route('calificaciones.list', $estudiante->user_id) }}" class="btn btn-primary btn-sm pull-left">Calificaciones</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endsection
