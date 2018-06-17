<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
  protected $table="actividades";
  protected $fillable = [
    'nombre',
    'porcentaje',
    'curso_id',
  ];

  public function subactividades() {
    return $this->hasMany('App\Subactividad');
  }

  public function curso() {
    return $this->belongsTo('App\Curso');
  }
}
