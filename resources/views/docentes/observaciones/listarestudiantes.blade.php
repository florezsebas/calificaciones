@extends('layouts.docentes')

@section('content')
<h2>Estudiantes del curso {{ $curso->nombre  }} del grado {{$curso->grupo->grado->nombre }} {{$curso->grupo->nombre}} Jornada {{$curso->grupo->grado->jornada->nombre}} </h2> <br>
<!-- Tabla que muestra los estudiantes -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Codigo</th>
        <th scope="col">Apellidos:Nombres</th>
        <th scope="col">Accion</th>
      </tr>
    </thead>
    <tbody>
      @foreach($estudiantes as $estudiante)
        <tr>
          <td>{{ $estudiante->user->codigo }}</td>
          <td>{{ $estudiante->user->apellidos }} {{ $estudiante->user->nombres }}</td>
          <td>
            <a href="{{ route('observaciones.listar', [$curso->id, $estudiante->user_id]) }}" class="btn btn-primary btn-sm pull-left">Observaciones</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>
@endsection
