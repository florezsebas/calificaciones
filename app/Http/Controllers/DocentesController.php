<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Docente;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserCreateRequest;


class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    public function index()
    {

        $users = User::has('docente')->paginate(5);
        return view('admin.usuarios.docentes.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios.docentes.create');
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
        $user->tipo = "docente";
        $password = str_replace('/', '', $user->fecha_nacimiento); 
        $user->password = bcrypt($password);
        $user->save();
        $docente = new Docente();
        $user->docente()->save($docente);
        
        Flash::success("Se ha registado el usuario " . $user->nombres . " de forma exitosa!");
        
        return redirect()->route('docentes.index');
        
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
        $user->docente;
        //dd($user->id);
        return view('admin.usuarios.docentes.edit')->with('user', $user);
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
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->email = $request->email;
        $user->codigo = $request->codigo;
        $docente = Docente::find($user->id);
        $docente->save();
        $user->save();
        
        //dd($user);
        
        Flash::success("Se ha editado el usuario " . $user->nombres . " de forma exitosa!");
        
        return redirect()->route('docentes.index');
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
        
        Flash::warning("El usuario " . $user->nombres . " se ha eliminado de forma exitosa");
        return redirect()->route('docentes.index');
        
        //$docente = Docente::where('user_id', $id);
        //$docente->delete();
        //dd($user);
    }
}
