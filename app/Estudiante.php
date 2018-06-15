<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
  protected $primaryKey = 'user_id';
  protected $table="estudiantes";
  protected $fillable=[
    'grupo_id',
    'acudiente_id',
    'user_id',
  ];

  public $incrementing = false;
  
  public function acudiente() {
    return $this->belongsTo('App\Acudiente','acudiente_id');
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
  
  public function user() {
    return $this->belongsTo('App\User');
  }

}
