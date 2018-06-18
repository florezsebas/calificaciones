@extends('layouts.docentes')

@section('content')
<h4>Estudiantes del curso {{ $curso->nombre }} grado {{ $curso->grupo->grado->nombre }} grupo {{ $curso->grupo->nombre }} </h4>

<!--Tabla que muestra los estudiantes del curso seleccionado-->
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Apellidos</th>
                <th scope="col">Nombre</th>
                <th scope="col">Código</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->user->apellidos }}</td>
                    <td>{{ $estudiante->user->nombres }}</td>
                    <td>{{ $estudiante->user->codigo }}</td>
                    <td>{{ $estudiante->user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection