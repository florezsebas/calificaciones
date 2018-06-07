<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Periodo;
use Laracasts\Flash\Flash; 

class PeriodosController extends Controller
{
    public function index()
    {
        $periodos = Periodo::all();
        return view('admin.periodos.index')->with('periodos', $periodos);
    }
    
    public function create() {
    
        return view('admin.periodos.create');
    }
    
    public function store(Request $request)
    {
        $periodo = new Periodo($request->all());
        $periodo->save();
        // dd($periodo->nombre);
        // dd($periodo->fecha_inicio);
        // dd($periodo);
        Flash::success("Se ha registrado el periodo " . $periodo->nombre . " de forma exitosa!");
        return redirect()->route('periodos.index');
    }
    
    
    public function show($id)
    {
        //
    }
    
    public function edit($id)
    {
        $periodo = Periodo::find($id);

        return view('admin.periodos.edit')->with('periodo', $periodo);
    }
    
    
    public function update(Request $request, $id)
    {
        $periodo = Periodo::find($id);
        $periodo->nombre = $request->nombre;
        $periodo->fecha_inicio = $request->fecha_inicio;
        $periodo->fecha_fin = $request->fecha_fin;
        $periodo->save();
        
        Flash::success("Se ha editado el grupo " . $periodo->nombre . " de forma exitosa!");
         
        return redirect()->route('periodos.index');
    }
    
    public function destroy($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();
        
        Flash::warning("El grupo " . $grupo->grado->nombre ." ". $grupo->nombre . " se ha eliminado de forma exitosa");
        
        return redirect()->route('grupos.index');
    }
}
