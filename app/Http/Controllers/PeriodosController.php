<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PeriodosController extends Controller
{
    public function index()
    {
        // $periodo = Periodo::all();
        return view('admin.periodos.index'); //->with('periodo', $periodo);
    }
    
    public function create()
    {
        $jornadas = Jornada::all()->pluck('nombre', 'id');
        $grados = Grado::all()->pluck('nombre', 'id');
        
        return view('admin.periodos.create')->with('jornadas', $jornadas)
                                          ->with('grados', $grados);
    }
    
    public function store(Request $request)
    {
        //dd($request->all());
        $grupo = new Grupo($request->all());
        $grupo->save();
        
        return redirect()->route('grupos.index');
    }
    
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $grupo = Grupo::find($id);
        $jornadas = Jornada::all()->pluck('nombre', 'id');
        $grados = Grado::all()->pluck('nombre', 'id');
        
        return view('admin.grupos.edit')->with('jornadas', $jornadas)
                                        ->with('grados', $grados)
                                        ->with('grupo', $grupo);
    }
    
    
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
    
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        
        Flash::warning("El grupo " . $grupo->grado->nombre ." ". $grupo->nombre . " se ha eliminado de forma exitosa");
        
        return redirect()->route('grupos.index');
    }
}
