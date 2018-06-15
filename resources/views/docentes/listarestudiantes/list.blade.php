@extends('layouts.docentes')

@section('content')
<h4>Estudiantes del curso </h4>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Nombre</th>
                <th scope="col">Codigo</th>
                <th scope="col">Correo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td>{{ $estudiante->user_id }}</td>
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