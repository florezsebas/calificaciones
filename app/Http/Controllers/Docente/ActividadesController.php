<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Jornada;
use App\Curso;
use App\Actividad;
use App\Calificacion;
use App\Periodo;
use Laracasts\Flash\Flash;

class ActividadesController extends Controller
{
    
    public function index()
    {
        $usuario = Auth::user();
        $cursos = $usuario->docente->cursos;
        return view('docentes.actividades.index')->with('cursos',$cursos);
    }

    public function listingActivities($id) {
        
        $curso = Curso::where('id',$id)->first();
        $actividades = $curso->actividades;
        return view('docentes.actividades.list')->with('actividades',$actividades)
                                                ->with('curso', $curso);
    }

    public function create(Request $request, $curso_id) {
        $curso = Curso::find($curso_id);
        $actividades = $curso->actividades;
        $porcentaje_usado = 0.0;
        $periodos = Periodo::all()->pluck('nombre','id');
        foreach($actividades as $actividad)
            $porcentaje_usado += $actividad->porcentaje;
        $porcentaje_disp = 100 - $porcentaje_usado;
        return view('docentes.actividades.create')->with('curso',$curso)
                                                  ->with('periodos',$periodos)
                                                  ->with('porcentaje_disp',$porcentaje_disp);
    }

    public function store(Request $request,$curso_id)
    {
        $actividad = new Actividad($request->all());
        $actividad->curso_id = $curso_id;
        $actividad->save();
        
        Flash::success("Se ha creado la actividad ". $actividad->nombre  ." exitosamente!");
        return redirect()->route('actividades.list', $curso_id);
    }

    public function edit(Request $request,$actividad_id)
    {
        $actividad = Actividad::find($actividad_id);
        $curso = Curso::find($actividad->curso_id);
        $actividades = $curso->actividades;
        $porcentaje_usado = 0.0;
        $periodos = Periodo::all()->pluck('nombre','id');
        foreach($actividades as $act)
            $porcentaje_usado += $act->porcentaje;
        $porcentaje_disp = 100 - $porcentaje_usado + $actividad->porcentaje;
        return view('docentes.actividades.edit')->with('curso',$curso)
                                                ->with('actividad',$actividad)
                                                ->with('periodos',$periodos)
                                                ->with('porcentaje_disp',$porcentaje_disp);
    }

    public function update(Request $request,$actividad_id) {
        $actividad = Actividad::find($actividad_id);
        $actividad->nombre = $request->nombre;
        $actividad->porcentaje = $request->porcentaje;
        $actividad->periodo_id = $request->periodo_id;
        $actividad->save();
        $curso = Curso::find($actividad->curso_id);
        $actividades = $curso->actividades;
        Flash::success("Se ha editado la actividad " . $actividad->nombre . " exitosamente");
        return redirect()->route('actividades.list', $curso->id);
    }
    
    public function destroy(Request $request,$actividad_id) {
        $actividad = Actividad::find($actividad_id);
        $actividad->delete();
        Flash::warning("La actividad ".$actividad->nombre." se ha eliminado correctamente");
        $curso = Curso::find($actividad->curso_id);
        $actividades = $curso->actividades;
        return redirect()->route('actividades.list', $curso->id);
    }
    
}
