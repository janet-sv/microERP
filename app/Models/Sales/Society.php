<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Society extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['razon_social','ruc','descripcion'];
}
