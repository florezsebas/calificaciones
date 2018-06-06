<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jornada;
use Laracasts\Flash\Flash;

class JornadasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jornadas = Jornada::all();
        return view('admin.jornadas.index')->with('jornadas', $jornadas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jornadas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jornada = new Jornada($request->all());
        $jornada->save();
        
        Flash::success("Se ha registrado la jornada " . $jornada->nombre . " de forma exitosa!");
        
        return redirect()->route('jornadas.index');
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
        $jornada = Jornada::find($id);
        return view('admin.jornadas.edit')->with('jornada', $jornada);
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
        $jornada = Jornada::find($id);
        $jornada->nombre = $request->nombre;
        $jornada->hora_inicio = $request->hora_inicio;
        $jornada->hora_fin = $request->hora_fin;
        $jornada->save();
        
        Flash::success("Se ha editado la jornada " . $jornada->nombre . " de forma exitosa!");
        
        return redirect()->route('jornadas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jornada = Jornada::find($id);
        $jornada->delete();
        //dd($id);
        Flash::warning("La jornada " . $jornada->nombre . " se ha eliminado de forma exitosa");
        
        return redirect()->route('jornadas.index');
    }
}
