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
        return view('estudiantes.calificaciones.index')->with('promedio_final_cursos',$promedio_final_cursos)
                                        ->with('cursos',$cursos)
                                        ->with('estudiante',$estudiante)
                                        ->with('periodos', $periodos);
    }
}
