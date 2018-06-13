<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;
use App\Grupo;
use App\Curso;
use App\Jornada;
use Laracasts\Flash\Flash; 

class VerGruposController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function loadGrados(Request $request) {
        if($request->ajax()) {
            $grados = Grado::where("jornada_id",$request->jornada_id)->pluck('nombre','id');
            return response()->json($grados);
        }
    }
     
    public function loadGroups(Request $request) {
        if($request->ajax()) {
            $grupos = Grupo::where("grado_id",$request->grado_id)->pluck('nombre','id');
            return response()->json($grupos);
        }
    }
    
    public function loadCourses(Request $request) {
        if($request->ajax()) {
            $grupos = Curso::where("grupo_id",$request->grupo_id)->pluck('nombre','id');
            return response()->json($grupos);
        }
    }

    public function index()
    {
        $jornadas = Jornada::all()->pluck('nombre','id');
        $grupos = Grupo::all()->pluck('nombre','id');
        $grados = Grado::all()->pluck('nombre','id');
        $cursos = Curso::all()->pluck('nombre','id');
        // dd($cursos);
        return view('docentes.grupos.index')->with('grupos', $grupos)
                                            ->with('grados', $grados)
                                            ->with('cursos', $cursos)
                                            ->with('jornadas',$jornadas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jornadas = Jornada::all()->pluck('nombre', 'id');
        $grados = Grado::all()->pluck('nombre', 'id');

        return view('admin.grupos.create')->with('jornadas', $jornadas)
                                          ->with('grados', $grados);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $grupo = new Grupo($request->all());
        $grupo->save();
        
        return redirect()->route('grupos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grupo = Grupo::find($id);
        $jornadas = Jornada::all()->pluck('nombre', 'id');
        $grados = Grado::all()->pluck('nombre', 'id');
        
        return view('admin.grupos.edit')->with('jornadas', $jornadas)
                                        ->with('grados', $grados)
                                        ->with('grupo', $grupo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grupo = Grupo::find($id);
        $grupo->nombre = $request->nombre;
        $grupo->jornada_id = $request->jornada_id;
        $grupo->grado_id = $request->grado_id;
        $grupo->save();
        
        Flash::success("Se ha editado el grupo " . $grupo->nombre . " de forma exitosa!");
         
        return redirect()->route('grupos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        
        Flash::warning("El grupo " . $grupo->grado->nombre ." ". $grupo->nombre . " se ha eliminado de forma exitosa");
        
        return redirect()->route('grupos.index');
    }
}

