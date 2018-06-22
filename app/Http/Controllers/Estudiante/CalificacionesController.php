<?php

namespace App\Http\Controllers\Estudiante;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Estudiante;
use App\Curso;
use App\Periodo;

use App\Http\Controllers\Controller;

class CalificacionesController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $estudiante = $usuario->estudiante;
        $grupo = $estudiante->grupo;
        $cursos = $grupo->cursos;
        $periodos = Periodo::all()->pluck('nombre', 'id');
        $cursos = Curso::where('periodo_id',$request->periodo_id)->where('grupo_id', $grupo->id)->get();
        return view('estudiantes.calificaciones.index')->with('cursos',$cursos)
                                        ->with('estudiante',$estudiante)
                                        ->with('periodos', $periodos);
    }
}
