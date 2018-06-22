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
  
  public function observaciones() {
    return $this->hasMany('App\Periodo');
  }
  
  public function cursos() {
    return $this->hasMany('App\Curso');
  }
  
}
