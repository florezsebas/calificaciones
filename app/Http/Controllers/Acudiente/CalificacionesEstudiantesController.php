<?php

namespace App\Http\Controllers\Acudiente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Acudiente;
use App\Estudiante;
use App\Periodo;
use App\Curso;

class CalificacionesEstudiantesController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $acudiente = $usuario->acudiente;
        $estudiantes = $acudiente->estudiantes;
        $periodos = Periodo::all()->pluck('nombre','id');
        return view('acudientes.calificaciones.index')->with('periodos',$periodos)
                                                      ->with('estudiantes',$estudiantes);
    }
    
    public function listingGrades(Request $request, $user_id)
    {
        $estudiante = Estudiante::find($user_id);
        $periodo = Periodo::find($request->periodo_id);
        $grupo = $estudiante->grupo;
        $cursos = $grupo->cursos;
        $periodos = Periodo::all()->pluck('nombre','id');
        
        $promedios_cursos = array();
        foreach($cursos as $curso) {
            $promedio = 0.0;
            foreach($curso->actividades as $actividad) {
              $nota = $actividad->obtenerCalificacion($estudiante->user_id); 
              $porcentaje = $actividad->porcentaje;
              $promedio += $nota * ($porcentaje/100);
              $promedio = number_format((float)$promedio, 1, '.', '');
            }
            
            if(array_key_exists($curso->nombre,$promedios_cursos))
                $promedios_cursos[$curso->nombre] += $promedio;
            else
                $promedios_cursos[$curso->nombre] = $promedio;
        }
        
        $promedio_final_cursos = array();
        foreach($promedios_cursos as $curso_nombre => $promedio)
            if(count($periodos))
                $promedio_final_cursos[$curso_nombre] =  number_format((float)($promedio/count($periodos)),1,'.','' );

        
        $cursos = Curso::where('periodo_id',$request->periodo_id)->where('grupo_id', $grupo->id)->get();
        return view('acudientes.calificaciones.listar')->with('promedio_final_cursos',$promedio_final_cursos)
                                                       ->with('user_id',$user_id)
                                                       ->with('periodos',$periodos)
                                                       ->with('cursos',$cursos)
                                                       ->with('estudiante',$estudiante)
                                                       ->with('periodo',$periodo);
    }
}
