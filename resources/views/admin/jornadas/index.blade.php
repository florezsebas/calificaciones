@extends('layouts.admin')

@section('content')
<h2>Gestion de jornadas</h2> <br>
<a href="" class="btn btn-primary" style="margin-bottom:1em">Nueva jornada</a>

<!-- Tabla que muestra las jornadas -->
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Hora de inicio</th>
      <th scope="col">Hora de finalizacion</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td>1</td>
        <td>JT</td>
        <td>7:00</td>
        <td>12:00</td>
        <td>
            <a href="" class="btn btn-primary btn-xs pull-left">Editar</a>
            <a href="" class="btn btn-danger btn-xs pull-left">Eliminar</a></td>
        </td>
        
      </tr>
  </tbody>
</table>
@endsection
