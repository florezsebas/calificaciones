<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jornada;

class ActividadesController extends Controller
{
    public function index()
    {
        $jornadas = Jornada::all()->pluck('nombre','id');
        return view('docentes.actividades.index')->with('jornadas',$jornadas);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
