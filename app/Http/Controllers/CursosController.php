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
use App\Periodo;

class CursosController extends Controller
{
    
    
    public function index()
    {
        $periodos = Periodo::all();
        return view('admin.cursos.index')->with('periodos',$periodos);
    }
    
    public function listarCursos(Request $request, $periodo_id)
    {
        $periodo = Periodo::find($periodo_id);
        $cursos = $periodo->cursos;
        //$cursos = Curso::orderBy('id', 'ASC')->paginate(5);
        //$cursos = Curso::periodo('1')->orderBy('id', 'ASC')->paginate(5);
        $cursos->each(function($cursos) {
            $cursos->grupo;
            $cursos->docente;
        });
        return view('admin.cursos.list')->with('periodo',$periodo)
                                        ->with('cursos',$cursos);
    }
    
    public function create(Request $request, $periodo_id)
    {
        $jornadas = Jornada::all()->pluck('nombre','id');
        $docentes = User::has('docente')->get()->pluck('full_name','id');
        return view('admin.cursos.create')->with('docentes', $docentes)
                                          ->with('jornadas', $jornadas)
                                          ->with('periodo_id', $periodo_id);
    }

    public function store(Request $request,$periodo_id)
    {
        $curso = new Curso($request->all());
        $curso->periodo_id = $periodo_id;
        $curso->save();
        Flash::success("Se ha registrado el curso ".$curso->nombre." exitosamente!");
        return redirect()->route('cursos.list',$periodo_id);
    }

    public function show($id)
    {
        //
    }

    public function edit($periodo_id,$curso_id)
    {
        $curso = Curso::find($curso_id);
        $docentes = User::has('docente')->get()->pluck('full_name','id');
        $jornadas = Jornada::all()->pluck('nombre','id');
        $grupos = Grupo::all()->pluck('nombre', 'id');
        $grados = Grado::all()->pluck('nombre', 'id');
        
        return view('admin.cursos.edit')->with('curso',$curso)
                                        ->with('grupos',$grupos)
                                        ->with('grados', $grados)
                                        ->with('docentes',$docentes)
                                        ->with('jornadas',$jornadas)
                                        ->with('periodo_id',$periodo_id);
    }

    public function update(Request $request, $periodo_id, $curso_id)
    {
        $curso = Curso::find($curso_id);
        $curso->nombre = $request->nombre;
        $curso->docente_id = $request->docente_id;
        $curso->grupo_id = $request->grupo_id;
        $curso->save();
        Flash::success("Se ha editado el curso ".$curso->nombre." exitosamente!");
        return redirect()->route('cursos.list',$periodo_id);
    }

    public function destroy($periodo_id, $curso_id)
    {
        $curso = Curso::find($curso_id);
        $curso->delete();
        Flash::warning("El curso ".$curso->nombre." se ha eliminado correctamente");
        return redirect()->route('cursos.list',$periodo_id);
    }
}
