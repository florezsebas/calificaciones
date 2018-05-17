<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Observacion extends Model
{
  protected $table="observaciones";
  protected $filiable=['descripcion',
    'curso_id',
    'codigo_estudiante'
  ];

  public function estudiantes() {
    return $this->belongTo('App\Estudiante','codigo_estudiante');
  }

  public function curso() {
    return $this->belongTo('App\Curso');
  }
}
