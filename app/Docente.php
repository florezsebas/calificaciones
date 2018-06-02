<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
  protected $primaryKey = 'codigo';
  protected $table="docentes";
  protected $fillable= [ 'codigo', 'user_id',];
  
  public $incrementing = false;
  
  public function cursos() {
    return $this->hasMany('App\Curso','codigo_profesor','codigo');
  }
  
  public function user() {
    return $this->belongsTo('App\User', 'user_id', 'codigo');
  }
}
