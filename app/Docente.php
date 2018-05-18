<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
  protected $primaryKey = 'codigo';
  protected $table="docentes";
  protected $filiable=[
    'codigo',
    'nombres',
    'apellidos',
    'email',
    'password'
  ];

  public function cursos() {
    return $this->hasMany('App\Curso','codigo_profesor','codigo');
  }
}
