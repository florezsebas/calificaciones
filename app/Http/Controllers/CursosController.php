<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Grupo;
use App\Grado;
use App\User;
use App\Docente;
use DB;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cursos = Curso::orderBy('id', 'ASC')->paginate(5);
        $cursos->each(function($cursos) {
            $cursos->grupo;
            $cursos->docente;
        });
        return view('admin.cursos.index')->with('cursos',$cursos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function getGroup(Request $request) {
        if($request->ajax()){
            // $grados = Grupo::all()->pluck('nombre','id');
            $grupos = Grupo::where("grado_id",$request->grado_id)->pluck('nombre','id');
            return response()->json($grupos);
        }
     }
     
    public function create(Request $request)
    {
        
        $grados = Grado::all()->pluck('nombre','id');
        $grupos = Grupo::all()->pluck('nombre','id');
        
        /* ---------------- preparacion de docente-usuario ---------------- */
        $users = User::has('docente')->get();
        // dd($users);
        $docentes = array();
        foreach($users as $user){
            $codigo = $user->codigo;
            $nombre_completo = $user->docente->nombres . " " . $user->docente->apellidos;
            array_push($docentes, $codigo);
        }
        //dd($docentes);
        return view('admin.cursos.create')->with('grados',$grados)
                                          ->with('grupos', $grupos)
                                          ->with('docentes', $docentes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $curso = new Curso($request->all());
        //$curso->save();
        //Flash::success("Se ha registrado el curso " . $curso->nombre . " de forma exitosa!");
        dd($request->all());
        return redirect()->route('cursos.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
