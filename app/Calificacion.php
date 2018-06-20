<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table="calificaciones";
    protected $fillable = [
      'valor',
      'estudiante_id',
      'curso_id',
      'actividad_id',
    ];

    public function estudiante() {
      return $this->belongsTo('App\Estudiante');
    }
    
    public function actividad() {
      return $this->belongsTo('App\Actividad');
    }
}
