<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Acudiente;
use Laracasts\Flash\Flash;
use App\Http\Requests\UserCreateRequest;

class AcudientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
       $users = User::has('acudiente')->paginate(5);
       /*$users = User::orderBy('id', 'ASC')->paginate(5);
       $users->each(function($users) {
            $users->load('acudiente');
        });*/
        //$users = $this->paginate($acudientes, 5);
        return view('admin.usuarios.acudientes.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('admin.usuarios.acudientes.create');
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
        $user->tipo = "acudiente";
        $password = str_replace('-', '', $user->fecha_nacimiento); 
        $user->password = bcrypt($password);
        $user->save();
        $acudiente = new Acudiente();
        $user->acudiente()->save($acudiente);
    
        Flash::success("Se ha registado el usuario " . $user->nombres . " de forma exitosa!");
        
        return redirect()->route('acudientes.index');
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
        $user->load('docente');
        //dd($user->id);
        return view('admin.usuarios.acudientes.edit')->with('user', $user);
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
        $acudiente = Acudiente::find($user->acudiente->codigo);
        $user->load('acudiente');
        //dd($user);
        $user->nombres = $request->nombres;
        $user->apellidos = $request->apellidos;
        $user->fecha_nacimiento = $request->fecha_nacimiento;
        $user->email = $request->email;
        $acudiente->codigo = $request->codigo;
        $acudiente->save();
        $user->save();
        
        Flash::success("Se ha editado el usuario " . $user->nombres . " de forma exitosa!");
        
        return redirect()->route('acudientes.index');
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
        
        return redirect()->route('acudientes.index');
    }
}
