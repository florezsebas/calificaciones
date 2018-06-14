<?php

namespace App\Http\Controllers\Docente;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jornada;
use App\Grupo;
use App\Grado;
use App\Curso;

class AjaxController extends Controller
{
    
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

}
