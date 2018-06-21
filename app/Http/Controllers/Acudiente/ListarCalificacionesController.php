<?php

namespace App\Http\Controllers\Acudiente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Acudiente;
use App\Estudiante;
use App\Periodo;

class ListarCalificacionesController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $acudiente = $usuario->acudiente;
        $estudiantes_a_cargo = $acudiente->estudiantes;
        $estudiantes = array();
        foreach($estudiantes_a_cargo as $estudiante)
            $estudiantes[$estudiante->user_id] = $estudiante->user->nombres;
        $periodos = Periodo::all()->pluck('nombre','id');
        return view('acudientes.calificaciones.index')->with('periodos',$periodos)
                                                      ->with('estudiantes',$estudiantes);
    }
    
    public function listingGrades(Request $request)
    {
        $estudiante = Estudiante::find($request->user_id);
        $periodo = Periodo::find($request->periodo_id);
        $grupo = $estudiante->grupo;
        $cursos = $grupo->cursos;
        return view('acudientes.calificaciones.listar')->with('periodo',$periodo)
                                                       ->with('cursos',$cursos)
                                                       ->with('estudiante',$estudiante);
    }
}
