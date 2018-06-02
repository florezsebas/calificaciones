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

  public function grupos() {
    return $this->hasMany('App\Grupo');
  }
  
}
