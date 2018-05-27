<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  protected $table="cursos";
  protected $filiable=[
    'nombre',
    'periodo_id',
    'codigo_profesor',
    'grupo_id'
  ];

  public function grupo() {
    return $this->belongsTo('App\Grupo');
  }

  public function profesor() {
    return $this->belongsTo('App\Profesor','codigo_profesor');
  }

  public function actividades() {
    return $this->hasMany('App\Actividad');
  }

  public function observaciones() {
    return $this->hasMany('App\Observacion');
  }

  public function calificaciones() {
    return $this->hasMany('App\Calificacion');
  }
}
