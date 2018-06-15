<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;
use App\Jornada;
use Laracasts\Flash\Flash;

class GradosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grados = Grado::orderBy('id', 'ASC')->paginate(6);
        return view('admin.grados.index')->with('grados', $grados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jornadas = Jornada::all()->pluck('nombre', 'id');
        //dd($jornadas);
        return view('admin.grados.create')->with('jornadas', $jornadas);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $grado = new Grado($request->all());
        $grado->save();
        
        Flash::success("Se ha registrado el grado " . $grado->nombre . " de forma exitosa!");
        
        return redirect()->route('grados.index');
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
        $grado = Grado::find($id);
        $jornadas = Jornada::all()->pluck('nombre', 'id');
        return view('admin.grados.edit')->with('grado', $grado)
                                        ->with('jornadas', $jornadas);
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
        $grado = Grado::find($id);
        $grado->nombre = $request->nombre;
        $grado->save();
        
        Flash::success("Se ha editado el grado " . $grado->nombre . " de forma exitosa!");
         
        return redirect()->route('grados.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grado = Grado::find($id);
        $grado->delete();
        
        Flash::warning("El grado " . $grado->nombre . " se ha eliminado de forma exitosa");
        
        return redirect()->route('grados.index');
    }
}
