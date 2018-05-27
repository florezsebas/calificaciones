<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
  protected $table="periodos";
  protected $filiable=[
    'nombre',
    'fecha_inicio',
    'fecha_fin',
  ];
  
  public function calificaciones() {
    return $this->belongsTo('App\Calificacion');
  }
}
