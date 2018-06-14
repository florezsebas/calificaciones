<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jornada;
use App\Curso;

class ListarEstudiantesController extends Controller
{

    public function index()
    {
        $jornadas = Jornada::all()->pluck('nombre','id');
        return view('docentes.listarestudiantes.index')->with('jornadas',$jornadas);
    }


    public function listingStudents(Request $request) {
        $curso = Curso::where('id', $request->curso_id)->first();
        $grupo = $curso->grupo;
        $estudiantes = $grupo->estudiantes;
        return view('docentes.listarestudiantes.list')->with('estudiantes',$estudiantes)
                                                      ->with('grupo',$grupo)
                                                      ->with('curso',$curso);
    }
    
}
