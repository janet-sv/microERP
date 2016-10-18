<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocondition extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['nombre','descripcion', 'cantidad_requerida', 'cantidad_descuento', 'cantidad_descuento', 'porcentaje_descuento'];

}
