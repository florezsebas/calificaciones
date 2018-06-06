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
}
