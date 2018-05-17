<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table="calificaciones";
    protected $filiable=['valor',
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
