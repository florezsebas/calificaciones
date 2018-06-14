<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table="calificaciones";
    protected $fillable=['valor',
      'codigo_estudiante',
      'actividad_id',
    ];

    public function estudiantes() {
      return $this->belongsTo('App\Estudiante','codigo_estudiante');
    }
    
    public function periodo() {
      return $this->hasMany('App\Periodo')
    }
    
    public function actividad() {
      return $this->belongsTo('App\Actividad');
    }
}
