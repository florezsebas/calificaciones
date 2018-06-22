@extends('layouts.docentes')

@section('content')
<h2>Actividades de los cursos</h2>
<h2>Periodos</h2> <br>

<!-- Tabla que muestra las jornadas -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Nombre</th>
        <th scope="col">Fecha inicio</th>
        <th scope="col">Fecha fin</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($periodos as $periodo)
        <tr>
          <td>{{ $periodo->nombre }}</td>
          <td>{{ $periodo->fecha_inicio }}</td>
          <td>{{ $periodo->fecha_fin }}</td>
          <td>
              <a href="{{ route('actividades.cursos', $periodo->id) }}" class="btn btn-primary btn-sm pull-left">Ver cursos</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>
@endsection
