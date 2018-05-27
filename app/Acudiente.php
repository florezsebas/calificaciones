<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
  protected $primaryKey = 'codigo';
  protected $table="acudientes";
  protected $filiable=[
    'codigo',
    'nombres',
    'apellidos',
    'email',
    'password'
  ];

  public $incrementing = false;

  public function estudiantes() {
    return $this->hasMany('App\Estudiante','codigo_acudiente','codigo');
  }
}