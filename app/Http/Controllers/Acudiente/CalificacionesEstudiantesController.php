<?php

namespace App\Http\Controllers\Acudiente;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Acudiente;
use App\Estudiante;
use App\Periodo;
use App\Curso;

class CalificacionesEstudiantesController extends Controller
{
    public function index(Request $request)
    {
        $usuario = Auth::user();
        $acudiente = $usuario->acudiente;
        //$estudiantes_a_cargo = $acudiente->estudiantes;
        $estudiantes = $acudiente->estudiantes;
        //dd($estudiantes->first()->user);
        //$estudiant = array();
        //$cursos = $grupo->cursos;
        // foreach($estudiantes_a_cargo as $estudiante)
        //     $estudiant[$estudiante->user_id] = $estudiante->user->nombres;
        // $estudiantes = collect($estudiant);
        $periodos = Periodo::all()->pluck('nombre','id');
        return view('acudientes.calificaciones.index')->with('periodos',$periodos)
                                                      ->with('estudiantes',$estudiantes);
    }
    
    public function listingGrades(Request $request, $user_id)
    {
        $estudiante = Estudiante::find($user_id);
        //dd($user_id);
        $periodo = Periodo::find($request->periodo_id);
        //dd($request->all());
        //dd($estudiante);
        $grupo = $estudiante->grupo;
        $cursos = $grupo->cursos;
        $periodos = Periodo::all()->pluck('nombre','id');
        $cursos = Curso::where('periodo_id',$request->periodo_id)->where('grupo_id', $grupo->id)->get();
        return view('acudientes.calificaciones.listar')->with('user_id',$user_id)
                                                       ->with('periodos',$periodos)
                                                       ->with('cursos',$cursos)
                                                       ->with('estudiante',$estudiante)
                                                       ->with('periodo',$periodo);
    }
}
