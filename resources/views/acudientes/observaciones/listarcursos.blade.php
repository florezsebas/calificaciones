@extends('layouts.acudientes')

@section('content')
<h2>Observaciones cursos</h2>
<h2>Cursos del estudiante {{ $estudiante->user->nombres }} {{ $estudiante->user->apellidos }}</h2>
<a href="{{ route('observaciones.acudientes.index') }}" class="btn btn-primary btn-bg pull-left">Atrás</a>
<br>
<br>
<!-- Tabla que muestra los cursos del estudiante seleccionado por el acudiente -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Nombre del curso</th>
        <th scope="col">Acción</th>
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
