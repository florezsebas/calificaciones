@extends('layouts.acudientes')

@section('content')
<!-- Tabla que muestra la descripcion de una observacion -->
<div class="table-responsive">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">Observación</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <p>{{ $observacion->descripcion }}</p>
        </td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
