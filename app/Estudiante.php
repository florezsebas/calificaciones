<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  protected $primaryKey = 'codigo';
  protected $table="estudiantes";
  protected $filiable=[
    'codigo',
    'grupo_id',
    'codigo_acudiente',
  ];

  public $incrementing = false;
  
  public function acudiente() {
    return $this->belongsTo('App\Acudiente','codigo_acudiente');
  }

  public function grupo() {
    return $this->belongsTo('App\Grupo');
  }
  
  public function observaciones() {
    return $this->hasMany('App\Observacion','codigo_estudiante','codigo');
  }

  public function calificaciones() {
    return $this->hasMany('App\Calificacion','codigo_estudiante','codigo');
  }

}
