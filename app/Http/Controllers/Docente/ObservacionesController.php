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
        $usuario = Auth::user();
        $cursos = $usuario->docente->cursos;
        return view('docentes.observaciones.index')->with('cursos',$cursos);
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

    public function crear(Request $request, $curso_id, $user_id)
    {
        $curso = Curso::find($curso_id);
        $estudiante = Estudiante::find($user_id);
        $periodos = Periodo::all()->pluck('nombre', 'id');
        return view('docentes.observaciones.create')->with('curso',$curso)
                                                    ->with('estudiante',$estudiante)
                                                    ->with('periodos', $periodos);
    }

    public function almacenar(Request $request, $curso_id, $user_id)
    {
        $observacion = new Observacion();
        $curso = Curso::find($curso_id);
        $observacion->titulo = $request->titulo;
        $observacion->descripcion = $request->descripcion;
        $observacion->curso_id = $curso_id;
        $observacion->estudiante_id = $user_id;
        $observacion->periodo_id = $request->periodo;
        $observacion->save();
        Flash::success("Se ha creado la observacion ". $observacion->titulo ." exitosamente!");
        return redirect()->route('observaciones.listar', [$curso_id, $user_id]);
    }

    public function show($id)
    {
        //
    }

    public function editar(Request $request,$obs_id)
    {
        $observacion = Observacion::find($obs_id);
        $curso = Curso::find($observacion->curso_id);
        $estudiante = Estudiante::find($observacion->estudiante_id);
        $periodos = Periodo::all()->pluck('nombre','id');

        return view('docentes.observaciones.edit')->with('curso',$curso)
                                                    ->with('estudiante',$estudiante)
                                                    ->with('periodos', $periodos)
                                                    ->with('observacion',$observacion);
    }

    public function actualizar(Request $request, $obs_id)
    {
        $observacion = Observacion::find($obs_id);
        $observacion->titulo = $request->titulo;
        $observacion->descripcion = $request->descripcion;
        $observacion->periodo_id = $request->periodo;
        $observacion->save();
        $curso_id = $observacion->curso_id;
        $user_id = $observacion->estudiante_id;
        Flash::success("Se ha editado la observacion ". $observacion->titulo ." exitosamente!");
        return redirect()->route('observaciones.listar', [$curso_id, $user_id]);
    }

    public function destruir(Request $request, $obs_id)
    {
        $observacion = Observacion::find($obs_id);
        $observacion->delete();
        $curso_id = $observacion->curso_id;
        $user_id = $observacion->estudiante_id;
        Flash::warning("La observacion ". $observacion->titulo ." se ha eliminado correctamente!");
        return redirect()->route('observaciones.listar', [$curso_id, $user_id]);
    }
}
