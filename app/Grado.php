<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
  protected $table = "grados";
  protected $fillable = [
    'nombre',
    'jornada_id',
    ];

  public function grupos() {
    return $this->hasMany('App\Grupo');
  }
  
  public function jornada() {
    return $this->belongsTo('App\Jornada');
  }
}
