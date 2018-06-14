<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserCreateRequest;
use App\User;
use App\Grupo;
use App\Grado;
use App\Jornada;
use App\Estudiante;

class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
    public function getGroups() 
    {
        // metodo para el selector dinamico
    }
    
    
    public function index()
    {
        $users = User::has('estudiante')->paginate(5);
        return view('admin.usuarios.estudiantes.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jornadas = Jornada::all()->pluck('nombre', 'id');
        $grados = Grado::all()->pluck('nombre', 'id');
        $grupos = Grupo::all()->pluck('nombre', 'id');
        $acudientes = User::has('acudiente')->get()->pluck('full_name', 'id');
        //dd($jornadas);
        return view('admin.usuarios.estudiantes.create')->with('jornadas', $jornadas)
                                                        ->with('grados', $grados)
                                                        ->with('grupos', $grupos)
                                                        ->with('acudientes', $acudientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $datos = $request->all();
        $user = new User($request->all());
        $user->tipo = 'estudiante';
        $password = str_replace('/', '', $user->fecha_nacimiento);
        $user->password = bcrypt($password);
        $user->save();
        $estudiante = new Estudiante();
        $estudiante->grupo_id = $datos['grupo_id'];
        $estudiante->acudiente_id = $datos['codigo_acudiente'];
        $user->estudiante()->save($estudiante);
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
        $user = User::find($id);
        $user->load('estudiante');
        
        $jornadas = Jornada::all()->pluck('nombre','id');
        $grados = Grado::all()->pluck('nombre','id');
        $grupos = Grupo::all()->pluck('nombre','id');
        
        return view('admin.usuarios.estudiantes.edit')->with('user',$user)
                                                      ->with('jornadas',$jornadas)
                                                      ->with('grados',$grados)
                                                      ->with('grupos',$grupos);
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
        $user = User::find($id);
        $estudiante = Estudiante::find($user->estudiante->codigo);
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->email = $request->email;
        $estudiante->codigo = $request->codigo;
        $estudiante->grupo_id = $request->grupo_id;
        $estudiante->acudiente_id = $request->acudiente_id;
        $estudiante->save();
        $user->save();
        
        return redirect()->route('estudiantes.index');
        
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
