<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
  protected $table="grados";
  protected $filiable=['nombres'];

  public function grupos() {
    return $this->hasMany('App\Grupo');
  }
}
