@extends('layouts.admin')

@section('content')
<h2>Gestión de cursos</h2>
<br>
<p style="color:red; font-size:15px;"> 
  Recuerde tener en cuenta que el nombre de un mismo curso que cree en cada periodo, 
  debe ser exactamente el mismo, ya que si no es así, el sistema tendrá en cuenta
  ese curso como otro diferente en el año. <br> <br>
  
  Ejemplo: 'Matematicas' del periodo 1, 'matematicas' del periodo 2 <br>
  En este caso las matematicas de ambos periodos no son el mismo ya que el nombre
  de cada curso comienza con la letra 'm' diferente. 
  
</p>
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
