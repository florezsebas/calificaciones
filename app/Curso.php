<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  protected $table="cursos";
  protected $fillable=[
    'nombre',
    'codigo_docente',
    'grupo_id'
  ];

  public function grupo() {
    return $this->belongsTo('App\Grupo');
  }

  public function docente() {
    return $this->belongsTo('App\Docente','codigo_docente');
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
