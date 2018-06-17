<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
  protected $table = "periodos";
  protected $fillable = [
    'nombre',
    'fecha_inicio',
    'fecha_fin',
  ];
  
  public function calificaciones() {
    return $this->hasMany('App\Calificacion');
  }
  
  public function observaciones() {
    return $this->hasMany('App\Periodo');
  }
}
