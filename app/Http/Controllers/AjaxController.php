<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grado;
use App\Grupo;

class AjaxController extends Controller
{
    public function loadGradosForCourse(Request $request)
    {
        if($request->ajax()){
            $grados = Grado::where("jornada_id",$request->jornada_id)->pluck('nombre','id');
            return response()->json($grados);
        }
    }
    
    public function loadGroupsForCourse(Request $request)
    {
        if($request->ajax()){
            $grupos = Grupo::where("grado_id",$request->grado_id)->pluck('nombre','id');
            return response()->json($grupos);
        }
    }

    public function loadGroupsForGroup(Request $request)
    {
        if($request->ajax()) {
            $grados = Grado::where("jornada_id",$request->jornada_id)->pluck('nombre','id');
            return response()->json($grados);
        }
    }

    public function loadGradosForStudent(Request $request)
    {
        if($request->ajax()) {
            $grados = Grado::where("jornada_id",$request->jornada_id)->pluck('nombre','id');
            return response()->json($grados);
        }
    }
    
    public function loadGroupsForStudent(Request $request)
    {
        if($request->ajax()) {
            $grados = Grupo::where("grado_id",$request->grado_id)->pluck('nombre','id');
            return response()->json($grados);
        }
    }
}
