<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
  protected $table="docentes";
  protected $fillable= [ 'user_id',];
  
  public $incrementing = false;
  
  public function cursos() {
    return $this->hasMany('App\Curso');
  }
  
  public function user() {
    return $this->belongsTo('App\User');
  }
}
