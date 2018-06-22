<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Jornada;
use App\Curso;
use App\Periodo;

class ListarEstudiantesController extends Controller
{

    public function index()
    {
        //$usuario = Auth::user();
        //$cursos = $usuario->docente->cursos;
        $periodos = Periodo::all();
        return view('docentes.listarestudiantes.index')->with('periodos', $periodos);
    }

    public function listingCourses($periodo_id)
    {
        $usuario = Auth::user();
        $cursos = Curso::where('periodo_id',$periodo_id)->where('docente_id', $usuario->id)->get();
        $periodo = Periodo::find($periodo_id);
        return view('docentes.listarestudiantes.listarcursos')->with('periodo',$periodo)
                                        ->with('cursos',$cursos);
    }

    public function listingStudents($periodo_id,$curso_id) {
        $curso = Curso::find($curso_id);
        $estudiantes = $curso->grupo->estudiantes;
        return view('docentes.listarestudiantes.list')->with('periodo_id',$periodo_id)
                                                      ->with('estudiantes',$estudiantes)
                                                      ->with('curso',$curso);
    }
    
}
