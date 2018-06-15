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
        $cursos = Curso::all();
        return view('docentes.listarestudiantes.index')->with('cursos', $cursos);
    }

    public function listingStudents($id) {
        $curso = Curso::find($id);
        $estudiantes = $curso->grupo->estudiantes;
        return view('docentes.listarestudiantes.list')->with('estudiantes',$estudiantes)
                                                      ->with('curso',$curso);
    }
    
}
