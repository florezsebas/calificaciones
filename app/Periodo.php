<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
  protected $table="periodos";
  protected $filiable=[
    'fecha_inicio',
    'fecha_fin'
  ];

  public function cursos() {
    return $this->hasMany('App\Curso');
  }
}
