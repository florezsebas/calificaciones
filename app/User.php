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
        return $this->hasOne('App\Docente');
    }
    
    public function estudiante() {
        return $this->hasOne('App\Estudiante');
    }
    
    public function acudiente() {
        return $this->hasOne('App\Acudiente');
    }

    public function getFullNameAttribute() {
        return $this->codigo . ': ' . $this->nombres . ' ' . $this->apellidos;
    }
}
