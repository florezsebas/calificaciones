<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jornada extends Model
{
  protected $table = "jornadas";
  
  protected $fillable = [
    'nombre',
    'hora_inicio',
    'hora_fin',
    ]; 

  public function grados() {
    return $this->hasMany('App\Grado');
  }
}
