@extends('layouts.acudientes')

@section('content')
<a href="{{ route('observaciones.list', [$curso->id, $estudiante->user_id]) }}" class="btn btn-primary btn-bg pull-left">Atrás</a>
<br>
<br>
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
