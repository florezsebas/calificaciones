@extends('layouts.admin')

@section('content')
<h2>Gestion de grupos</h2> <br>
<a href="" class="btn btn-primary" style="margin-bottom:1em">Nuevo grupo</a>

<!-- Tabla que muestra las jornadas -->
<table class="table table-sm">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nombre</th>
      <th scope="col">Jornada</th>
      <th scope="col">Grado</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
      <tr>
        <td>1</td>
        <td>T</td>
        <td></td>
        <td></td>
        <td>
            <a href="" class="btn btn-primary btn-xs pull-left">Editar</a>
            <a href="" class="btn btn-danger btn-xs pull-left">Eliminar</a></td>
        </td>
        
      </tr>
  </tbody>
</table>
@endsection
