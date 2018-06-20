<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Calificacion;
use App\Curso;
use App\Grupo;
use App\Actividad;
use App\Estudiante;
use Laracasts\Flash\Flash;

class CalificacionesController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $cursos = $usuario->docente->cursos;
        return view('docentes.calificaciones.index')->with('cursos',$cursos);
    }

    public function listingActivities(Request $request,$curso_id) {
        $curso = Curso::find($curso_id);
        $actividades = $curso->actividades;
        return view('docentes.calificaciones.listarcursos')->with('curso',$curso)
                                                   ->with('actividades',$actividades);
    }

    public function listingStudents(Request $request, $curso_id, $act_id) {
        $curso = Curso::find($curso_id);
        $estudiantes = $curso->grupo->estudiantes;
        $actividad = Actividad::find($act_id);
        return view('docentes.calificaciones.listarestudiantes')->with('curso',$curso)
                                                                ->with('estudiantes',$estudiantes)
                                                                ->with('actividad',$actividad);
    }
    
    public function create(Request $request, $curso_id, $act_id, $user_id)
    {
        $curso = Curso::find($curso_id);
        $estudiante = Estudiante::find($user_id);
        $calificacion = $estudiante->obtCalificacion($act_id,$curso_id);
        return view('docentes.calificaciones.create')->with('curso',$curso)
                                                     ->with('estudiante',$estudiante)
                                                     ->with('act_id',$act_id)
                                                     ->with('calificacion',$calificacion);
    }

    public function store(Request $request, $curso_id, $act_id, $user_id)
    {
        $calificacion = new Calificacion($request->all());
        $calificacion->estudiante_id = $user_id;
        $calificacion->curso_id = $curso_id;
        $calificacion->actividad_id = $act_id;
        $calificacion->save();

        Flash::success("Se ha registrado la calificacion exitosamente!");
        return redirect()->route('calificaciones.estudiantes.list',[$curso_id,$act_id]);
    }

}
