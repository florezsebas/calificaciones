<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo',
        'nombres', 
        'apellidos',
        'fecha_nacimiento',
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function docente() {
        return $this->hasOne('App\Docente', 'user_id');
    }
    
    public function estudiante() {
        return $this->hasOne('App\Estudiante', 'user_id');
    }
    
    public function acudiente() {
        return $this->hasOne('App\Acudiente', 'user_id');
    }

    public function getFullNameAttribute() {
        return $this->codigo . ': ' . $this->nombres . ' ' . $this->apellidos;
    }
    
    public function isAdmin(){
        return $this->tipo === 'admin';
    }
    
    public function isStudent(){
        return $this->tipo === 'estudiante';
    }
    
    public function isAttendant(){
        return $this->tipo === 'acudiente';
    }
    
    public function isTeacher(){
        return $this->tipo === 'docente';
    }
}
