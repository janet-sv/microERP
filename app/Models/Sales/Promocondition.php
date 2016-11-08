<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocondition extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['nombre','descripcion', 'cantidad_requerida', 'cantidad_descuento', 'porcentaje_descuento'];

}
