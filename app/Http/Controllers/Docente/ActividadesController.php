<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jornada;
use App\Curso;
use App\Actividad;
use Laracasts\Flash\Flash;

class ActividadesController extends Controller
{
    
    public function index()
    {
        $cursos = Curso::all();
        // $jornadas = Jornada::all()->pluck('nombre','id');
        return view('docentes.actividades.index')->with('cursos',$cursos);
    }

    public function listingActivities($id) {
        
        $curso = Curso::where('id',$id)->first();
        $actividades = $curso->actividades;
        //dd($actividades);
        return view('docentes.actividades.list')->with('actividades',$actividades)
                                                ->with('curso', $curso);
    }

    public function create(Request $request, $curso_id) {
        $curso = Curso::find($curso_id);
        return view('docentes.actividades.create')->with('curso',$curso);
    }

    public function store(Request $request,$curso_id)
    {
        $actividad = new Actividad($request->all());
        $curso = Curso::find($curso_id);
        $actividades = $curso->actividades;
        $actividad->curso_id = $curso_id;
        $actividad->save();
        Flash::success("Se ha creado la actividad ". $actividad->nombre  ." exitosamente!");
        return view('docentes.actividades.list')->with('curso',$curso)
                                                ->with('actividades',$actividades);
    }

    public function edit(Request $request,$actividad_id)
    {
        $actividad = Actividad::find($actividad_id);
        
        return view('docentes.actividades.edit')->with('actividad',$actividad);
    }

    public function update(Request $request,$actividad_id) {
        $actividad = Actividad::find($actividad_id);
        $actividad->nombre = $request->nombre;
        $actividad->porcentaje = $request->porcentaje;
        $actividad->save();
        $curso = Curso::find($actividad->curso_id);
        $actividades = $curso->actividades;
        Flash::success("Se ha editado la actividad " . $actividad->nombre . " exitosamente");
        return view('docentes.actividades.list')->with('curso', $curso)
                                                ->with('actividades', $actividades);
    }
    
    public function destroy(Request $request,$actividad_id) {
        $actividad = Actividad::find($actividad_id);
        $actividad->delete();
        Flash::warning("La actividad ".$actividad->nombre." se ha eliminado correctamente");
        $curso = Curso::find($actividad->curso_id);
        $actividades = $curso->actividades;
        return view('docentes.actividades.list')->with('curso', $curso)
                                                ->with('actividades', $actividades);
    }
}
