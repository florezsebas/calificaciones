@extends('layouts.docentes')

@section('content')
<h2>Cursos</h2> <br>

<!-- Tabla que muestra los cursos que dicta docente -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Jornada</th>
        <th scope="col">Grado:grupo</th>
        <th scope="col">Curso</th>
        <th scope="col">Acción</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cursos as $curso)
        <tr>
          <td>{{ $curso->grupo->grado->jornada->nombre }}</td>
          <td>{{ $curso->grupo->grado->nombre . " : "  . $curso->grupo->nombre }}</td>
          <td>{{ $curso->nombre }}</td>
          <td>
              <a href="{{ route('estudiantes.list', $curso->id) }}" class="btn btn-primary btn-sm pull-left">Listar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>
</div>
@endsection
