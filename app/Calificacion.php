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
      return $this->belongsTo('App\Estudiante','codigo_estudiante');
    }

    public function cursos() {
      return $this->belongsTo('App\Curso');
    }
    
    public function periodo() {
      return $this->hasMany('App\Periodo')
    }
}
