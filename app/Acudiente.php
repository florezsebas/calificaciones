<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
  protected $primaryKey = 'codigo';
  protected $table="acudientes";
  protected $fillable=[ 'codigo' , 'user_id',];

  public $incrementing = false;

  public function estudiantes() {
    return $this->hasMany('App\Estudiante','codigo_acudiente','codigo');
  }
  
  public function user() {
    return $this->belongsTo('App\User', 'id', 'codigo');
  }
}
