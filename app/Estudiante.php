<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  protected $table="estudiantes";
  protected $filiable=[
    'codigo',
    'nombres',
    'apellidos',
    'email',
    'password',
    'grupo_id',
    'codigo_acudiente'
  ];

  public function acudiente() {
    return $this->belongTo('App\Acudiente','codigo_acudiente');
  }

  public function grupo() {
    return $this->belongTo('App\Grupo');
  }
  
  public function observaciones() {
    return $this->hasMany('App\Observacion','codigo_estudiante','codigo');
  }

  public function calificaciones() {
    return $this->hasMany('App\Calificacion','codigo_estudiante','codigo');
  }

}
