<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
  protected $table="actividades";
  protected $fillable = [
    'nombre',
    'porcentaje',
    'curso_id',,
  ];

  public function curso() {
    return $this->belongsTo('App\Curso');
  }
  
  public function calificaciones() {
    return $this->hasMany('App\Calificacion');
  }
  
  public function obtenerCalificacion($user_id) {
    $calificacion = Calificacion::where('actividad_id', $this->id)->where('estudiante_id',$user_id)->first();
    if($calificacion == null)
      return 0;
    else
      return $calificacion->valor;
  }
}
