<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
  protected $table="docentes";
  protected $primaryKey = 'user_id';
  protected $fillable = [ 'user_id',];
  
  public $incrementing = false;
  
  public function cursos() {
    return $this->hasMany('App\Curso','docente_id');
  }
  
  public function user() {
    return $this->belongsTo('App\User');
  }
}
