<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table="calificaciones";
    protected $fillable = [
      'valor',
      'estudiante_id',
      'actividad_id',
    ];

    public function estudiante() {
      return $this->belongsTo('App\Estudiante');
    }
    
    public function periodo() {
      return $this->belongsTo('App\Periodo');
    }
    
    public function actividad() {
      return $this->belongsTo('App\Actividad');
    }
}
