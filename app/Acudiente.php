<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acudiente extends Model
{
  protected $table="acudientes";
  protected $primaryKey = 'user_id';
  protected $fillable = [ 'user_id',];

  public function estudiantes() {
    return $this->hasMany('App\Estudiante');
  }
  
  public function user() {
    return $this->belongsTo('App\User');
  }
}
