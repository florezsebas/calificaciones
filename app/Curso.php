<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Curso extends Model
{
  protected $table="cursos";
  protected $fillable=[
    'nombre',
    'docente_id',
    'grupo_id',
    'periodo_id'
  ];

  public function grupo() {
    return $this->belongsTo('App\Grupo');
  }

  public function docente() {
    return $this->belongsTo('App\Docente', 'docente_id');
  }

  public function actividades() {
    return $this->hasMany('App\Actividad');
  }
  
  public function calificaciones() {
    return $this->hasMany('App\Calificacion');
  }

  public function observaciones() {
    return $this->hasMany('App\Observacion');
  }
  
  public function periodo() {
    return $this->belongsTo('App\Periodo');
  }
  
  public function scopePeriodo($query, $periodo_id){
    return $query->where('periodo_id', $periodo_id);
  }
    
}
