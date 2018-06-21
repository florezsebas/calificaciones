<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
  protected $table = "observaciones";
  protected $fillable = [
    'titulo',
    'descripcion',
    'fecha_digitacion',
    'curso_id',
    'estudiante_id',
    
  ];

  public function estudiantes() {
    return $this->belongsTo('App\Estudiante');
  }

  public function curso() {
    return $this->belongsTo('App\Curso');
  }
  
  public function periodo() {
 
  
}
