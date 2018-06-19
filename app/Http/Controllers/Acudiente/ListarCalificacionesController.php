<?php

namespace App\Http\Controllers\Acudiente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Acudiente;
use App\Estudiante;

class ListarCalificacionesController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $acudiente = $usuario->acudiente;
        $estudiantes = $acudiente->estudiantes;
        return view('acudientes.calificaciones.index')->with('estudiantes',$estudiantes);
    }
    
    public function listingGrades(Request $request, $user_id)
    {
        $estudiante = Estudiante::find($user_id);
        $grupo = $estudiante->grupo;
        $cursos = $grupo->cursos;
        return view('acudientes.calificaciones.listar')->with('cursos',$cursos)
                                        ->with('estudiante',$estudiante);
    }
}
