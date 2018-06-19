<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Jornada;
use App\Curso;

class ListarEstudiantesController extends Controller
{

    public function index()
    {
        $usuario = Auth::user();
        $cursos = $usuario->docente->cursos;
        return view('docentes.listarestudiantes.index')->with('cursos', $cursos);
    }

    public function listingStudents($id) {
        $curso = Curso::find($id);
        $estudiantes = $curso->grupo->estudiantes;
        return view('docentes.listarestudiantes.list')->with('estudiantes',$estudiantes)
                                                      ->with('curso',$curso);
    }
    
}
