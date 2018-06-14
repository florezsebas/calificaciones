<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Curso;
use App\Grupo;
use App\Grado;
use App\User;
use App\Docente;
use App\Jornada;

class CursosController extends Controller
{
    public function loadGrados(Request $request) {
        if($request->ajax()){
            $grados = Grado::where("jornada_id",$request->jornada_id)->pluck('nombre','id');
            return response()->json($grados);
        }
    }
    
    public function loadGroups(Request $request) {
        if($request->ajax()){
            $grupos = Grupo::where("grado_id",$request->grado_id)->pluck('nombre','id');
            return response()->json($grupos);
        }
     }

    public function index()
    {
        $cursos = Curso::orderBy('id', 'ASC')->paginate(5);
        $cursos->each(function($cursos) {
            $cursos->grupo;
            $cursos->docente;
        });
        return view('admin.cursos.index')->with('cursos',$cursos);
    }
     
    public function create(Request $request)
    {
        $jornadas = Jornada::all()->pluck('nombre','id');
        $docentes = User::has('docente')->get()->pluck('full_name','id');
        return view('admin.cursos.create')->with('docentes', $docentes)
                                          ->with('jornadas',$jornadas);
    }

    public function store(Request $request)
    {
        $curso = new Curso($request->all());
        $curso->save();
        Flash::success("Se ha registrado el curso ".$curso->nombre." exitosamente!");
        return redirect()->route('cursos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $curso = Curso::find($id);
        $docentes = User::has('docente')->get()->pluck('full_name','id');
        $jornadas = Jornada::all()->pluck('nombre','id');
        $grupos = Grupo::all()->pluck('nombre', 'id');
        $grados = Grado::all()->pluck('nombre', 'id');
        
        return view('admin.cursos.edit')->with('curso',$curso)
                                        ->with('grupos',$grupos)
                                        ->with('grados', $grados)
                                        ->with('docentes',$docentes)
                                        ->with('jornadas',$jornadas);
    }

    public function update(Request $request, $id)
    {
        $curso = Curso::find($id);
        $curso->nombre = $request->nombre;
        $curso->docente_id = $request->docente_id;
        $curso->grupo_id = $request->grupo_id;
        $curso->save();
        Flash::success("Se ha editado el curso ".$curso->nombre." exitosamente!");
        return redirect()->route('cursos.index');
    }

    public function destroy($id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        Flash::warning("El curso ".$curso->nombre." se ha eliminado correctamente");
        return redirect()->route('cursos.index');
    }
}
