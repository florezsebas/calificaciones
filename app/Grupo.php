<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
  protected $table="grupos";
  protected $filiable=[
    'nombre',
    'jornada_id',
    'grado_id'
  ];

  public function grado() {
    return $this->belongso('App\Grado');
  }

  public function jornada() {
    return $this->belongsTo('App\Jornada');
  }

  public function estudiantes() {
    return $this->hasMany('App\Estudiante');
  }

  public function cursos() {
    return $this->hasMany('App\Curso');
  }
}
