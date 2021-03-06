<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  protected $primaryKey = 'user_id';
  protected $table = "estudiantes";
  protected $fillable = [
    'grupo_id',
    'acudiente_id',
    'user_id',
  ];

  public $incrementing = false;
  
  public function acudiente() {
    return $this->belongsTo('App\Acudiente');
  }

  public function grupo() {
    return $this->belongsTo('App\Grupo');
  }
  
  public function observaciones() {
    return $this->hasMany('App\Observacion', 'estudiante_id');
  }

  public function calificaciones() {
    return $this->hasMany('App\Calificacion');
  }
  
  public function user() {
    return $this->belongsTo('App\User');
  }
  
  public function obtCalificacion($act_id,$curso_id){
    $calificacion = Calificacion::where('actividad_id',$act_id)->where('estudiante_id', $this->user_id)->first();
    if(count($calificacion)== 0)
      return "NA";
    else 
      return $calificacion->valor;
  }

}

