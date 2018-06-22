<?php

namespace App\Http\Controllers\Acudiente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Acudiente;
use App\Estudiante;
use App\Curso;
use App\Observacion;
use App\Periodo;

class ObservacionesEstudiantesController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $estudiantes_a_cargo = $usuario->acudiente->estudiantes;
        $estudiant = array();
        foreach($estudiantes_a_cargo as $estudiante)
            $estudiant[$estudiante->user_id] = $estudiante->user->nombres;
        $estudiantes = collect($estudiant);
        $use_request = 1;
        $periodos = Periodo::all()->pluck('nombre', 'id');
        return view('acudientes.observaciones.index')->with('use_request',$use_request)
                                                    ->with('estudiantes',$estudiantes)
                                                    ->with('periodos',$periodos);
    }

    public function listingCourses(Request $request,$periodo_id,$user_id,$use_request)
    {
        $estudiante_id = $request->user_id;
        $periodo_id = $request->periodo_id;
        if(!$use_request)
        {
            $estudiante_id = $user_id;
            $periodo_id = $periodo_id;
        }
        
        $estudiante = Estudiante::find($estudiante_id);
        $grupo = $estudiante->grupo;
        $cursos = Curso::where('periodo_id',$periodo_id)->where('grupo_id', $grupo->id)->get();
        return view('acudientes.observaciones.listarcursos')->with('cursos',$cursos)
                                        ->with('estudiante',$estudiante);
    }

    public function listingObservations(Request $request,$curso_id,$user_id)
    {
        $curso = Curso::find($curso_id);
        $estudiante = Estudiante::find($user_id);
        $observaciones = Observacion::where('curso_id',$curso_id)->where('estudiante_id',$user_id)->get();
        $dont_use_request = 0;
        return view('acudientes.observaciones.listarobservaciones')->with('dont_use_request',$dont_use_request)
                                        ->with('estudiante',$estudiante)
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
