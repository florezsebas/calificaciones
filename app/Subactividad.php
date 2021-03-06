<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subactividad extends Model
{
  protected $table="subactividades";
  protected $fillable=[
    'nombre',
    'porcentaje',
    'actividad_id'
  ];

  public function actividad() {
    return $this->belongsTo("App\Actividad");
  }
}
