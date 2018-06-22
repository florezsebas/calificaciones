@extends('layouts.admin')

@section('content')
<h2>Gestión de cursos</h2>
<br>
<h4>Periodos</h4>

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
              <a href="{{ route('cursos.list', $periodo->id) }}" class="btn btn-primary btn-sm pull-left">Ver cursos</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>
@endsection
