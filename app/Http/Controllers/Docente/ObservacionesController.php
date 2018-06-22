<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Laracasts\Flash\Flash;
use App\Curso;
use App\Observacion;
use App\Estudiante;
use App\Periodo;

class ObservacionesController extends Controller
{

    public function index()
    {
        $periodos = Periodo::all();
        return view('docentes.observaciones.index')->with('periodos',$periodos);
    }

    public function listingCourses(Request $request,$periodo_id)
    {
        $usuario = Auth::user();
        $cursos = Curso::where('periodo_id',$periodo_id)->where('docente_id', $usuario->id)->get();
        $periodo = Periodo::find($periodo_id);
        return view('docentes.observaciones.listarcursos')->with('periodo',$periodo)
                                        ->with('cursos',$cursos);
    }

    public function listingStudents(Request $request,$curso_id) 
    {
        $curso = Curso::find($curso_id);
        $estudiantes = $curso->grupo->estudiantes;
        return view('docentes.observaciones.listarestudiantes')->with('curso',$curso)
                                                               ->with('estudiantes',$estudiantes);
    }

    public function observationStudents(Request $request, $curso_id, $user_id)
    {
        $curso = Curso::find($curso_id);
        $estudiante = Estudiante::find($user_id);
        $observaciones = $estudiante->observaciones;
        return view('docentes.observaciones.list')->with('observaciones',$observaciones)
                                                                ->with('curso',$curso)
                                                                ->with('estudiante',$estudiante);
    }

    public function create(Request $request, $curso_id, $user_id)
    {
        $curso = Curso::find($curso_id);
        $estudiante = Estudiante::find($user_id);
        return view('docentes.observaciones.create')->with('curso',$curso)
                                                    ->with('estudiante',$estudiante);
    }

    public function store(Request $request, $curso_id, $user_id)
    {
        $observacion = new Observacion($request->all());
        $observacion->curso_id = $curso_id;
        $observacion->estudiante_id = $user_id;
        $observacion->save();
        Flash::success("Se ha creado la observacion ". $observacion->titulo ." exitosamente!");
        return redirect()->route('observaciones.listar', [$curso_id, $user_id]);
    }

    public function show($curso_id,$user_id,$obs_id)
    {
        $curso = Curso::find($curso_id);
        $estudiante = Estudiante::find($user_id);
        $observacion = Observacion::find($obs_id);
        return view('docentes.observaciones.show')->with('observacion',$observacion)
                                                  ->with('estudiante',$estudiante)
                                                  ->with('curso',$curso);
    }

    public function edit(Request $request,$obs_id)
    {
        $observacion = Observacion::find($obs_id);
        $curso = Curso::find($observacion->curso_id);
        $estudiante = Estudiante::find($observacion->estudiante_id);

        return view('docentes.observaciones.edit')->with('curso',$curso)
                                                    ->with('estudiante',$estudiante)
                                                    ->with('observacion',$observacion);
    }

    public function update(Request $request, $obs_id)
    {
        $observacion = Observacion::find($obs_id);
        $observacion->titulo = $request->titulo;
        $observacion->fecha_digitacion = $request->fecha_digitacion;
        $observacion->descripcion = $request->descripcion;
        $observacion->save();
        $curso_id = $observacion->curso_id;
        $user_id = $observacion->estudiante_id;
        Flash::success("Se ha editado la observacion ". $observacion->titulo ." exitosamente!");
        return redirect()->route('observaciones.listar', [$curso_id, $user_id]);
    }

    public function destroy(Request $request, $obs_id)
    {
        $observacion = Observacion::find($obs_id);
        $observacion->delete();
        $curso_id = $observacion->curso_id;
        $user_id = $observacion->estudiante_id;
        Flash::warning("La observacion ". $observacion->titulo ." se ha eliminado correctamente!");
        return redirect()->route('observaciones.listar', [$curso_id, $user_id]);
    }
}
