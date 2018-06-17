<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UserCreateRequest;
use Laracasts\Flash\Flash;
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
        $estudiante->acudiente_id = $request->acudiente_id;
        $user->estudiante()->save($estudiante);
        
        return redirect()->route('estudiantes.index');
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
        //$acudiente = $user->estudiante->grupo->grado->jornada_id;
        
        $jornadas = Jornada::all()->pluck('nombre','id');
        $grados = Grado::all()->pluck('nombre','id');
        $grupos = Grupo::all()->pluck('nombre','id');
        $acudientes = User::has('acudiente')->get()->pluck('full_name', 'id');
        //dd($acudientes);
        return view('admin.usuarios.estudiantes.edit')->with('user',$user)
                                                      ->with('jornadas',$jornadas)
                                                      ->with('grados',$grados)
                                                      ->with('grupos',$grupos)
                                                      ->with('acudientes', $acudientes);
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
        $user->codigo = $request->codigo;
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->email = $request->email;
        
        $estudiante = Estudiante::find($user->id);
        $estudiante->grupo_id = $request->grupo_id;
        $estudiante->acudiente_id = $request->acudiente_id;
        $estudiante->save();
        $user->save();
        
        Flash::success("Se ha editado el estudiante " . $user->nombres . " de forma exitosa!");
        
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
        $user = User::find($id);
        $user->delete();
    }
}
