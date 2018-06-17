<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Calificacion;
use App\Curso;
use App\Grupo;
use App\Periodo;
use App\Actividad;
use Laracasts\Flash\Flash;

class CalificacionesController extends Controller
{
    public function index()
    {
        $cursos = Curso::all();
        return view('docentes.calificaciones.index')->with('cursos',$cursos);
    }

    public function listingActivities(Request $request,$curso_id) {
        $curso = Curso::find($curso_id);
        $actividades = $curso->actividades;
        return view('docentes.calificaciones.list')->with('curso',$curso)
                                                   ->with('actividades',$actividades);
    }

    public function listingStudents(Request $request, $curso_id, $act_id) {
        $curso = Curso::find($curso_id);
        $actividad = Actividad::find($act_id);
        $estudiantes = $curso->grupo->estudiantes;
        $periodos = Periodo::all()->pluck('nombre','id');
        $calificaciones = Calificacion::where('actividad_id',$act_id)->get();
        return view('docentes.calificaciones.listarestudiantes')->with('curso',$curso)
                                                                ->with('estudiantes',$estudiantes)
                                                                ->with('periodos',$periodos)
                                                                ->with('actividad',$actividad)
                                                                ->with('calificaciones',$calificaciones);
    }

    public function store(Request $request, $curso_id, $act_id)
    {
        $calificaciones = Calificacion::where('actividad_id',$act_id)->get();
        if(count($calificaciones) == 0) {
            /* Seccion para crear la calificacion */
            for($i=0; $i < count($request->calificaciones); $i++) {
                $calificacion = new Calificacion();
                $calificacion->valor = $request->calificaciones[$i];
                $calificacion->estudiante_id = $request->codigos[$i];
                $calificacion->curso_id = $curso_id;
                $calificacion->periodo_id = $request->periodo;
                $calificacion->actividad_id = $act_id;
                $calificacion->save();
            }
        }
        else { 
            /* Seccion de actualizacion de calificacion */
            $i=0;
            foreach($calificaciones as $calificacion) {
                $calificacion->valor = $request->calificaciones[$i];
                //$calificacion->estudiante_id = $request->codigos[$i];
                //$calificacion->curso_id = $curso_id;
                $calificacion->periodo_id = $request->periodo;
                //$calificacion->actividad_id = $act_id;
                $calificacion->save();
                $i++;
            }
        }
        Flash::success("Se ha registrado las calificaciones exitosamente!");
        return redirect()->route('calificaciones.actividades.list',$curso_id);
    }

}
