<?php

namespace App\Http\Controllers\Acudiente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Acudiente;
use App\Estudiante;
use App\Curso;
use App\Observacion;

class ListarObservacionesController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $acudiente = $usuario->acudiente;
        $estudiantes = $acudiente->estudiantes;
        return view('acudientes.observaciones.index')->with('estudiantes',$estudiantes);
    }
    
    public function listingCourses(Request $request, $user_id)
    {
        $estudiante = Estudiante::find($user_id);
        $grupo = $estudiante->grupo;
        $cursos = $grupo->cursos;
        return view('acudientes.observaciones.listarcursos')->with('cursos',$cursos)
                                        ->with('estudiante',$estudiante);
    }

    public function listingObservations(Request $request,$curso_id,$user_id)
    {
        $curso = Curso::find($curso_id);
        $estudiante = Estudiante::find($user_id);
        $observaciones = Observacion::where('curso_id',$curso_id)->where('estudiante_id',$user_id)->get();
        return view('acudientes.observaciones.listarobservaciones')->with('estudiante',$estudiante)
                                        ->with('curso',$curso)
                                        ->with('observaciones',$observaciones);
    }
    
    public function mostrarObservation(Request $request,$obs_id,$curso_id,$user_id)
    {
        $curso = Curso::find($curso_id);
        $estudiante = Estudiante::find($user_id);
        $observacion = Observacion::find($obs_id);
        return view('acudientes.observaciones.descripcion')->with('curso',$curso)
                                                           ->with('estudiante',$estudiante)
                                                           ->with('observacion',$observacion);
    }
    
}
