<?php

namespace App\Http\Controllers\Estudiante;

use Illuminate\Http\Request;
use App\Estudiante;

use App\Http\Controllers\Controller;

class ListarCalificacionesController extends Controller
{
    public function index(Request $request)
    {
        $estudiante = Estudiante::find(7);
        $grupo = $estudiante->grupo;
        $cursos = $grupo->cursos;
        return view('estudiantes.calificaciones.index')->with('cursos',$cursos)
                                        ->with('estudiante',$estudiante);
    }
}
