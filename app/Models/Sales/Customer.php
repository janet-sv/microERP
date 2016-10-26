<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['tipo_contribuyente','nombre','apellido_paterno', 
    'apellido_materno', 'razon_social', 'ruc', 'sexo','tipo_documento', 'numero_documento',
    'porcentaje_descuento', 'plazo_credito', 'estado', 'id_sociedad'];

    public function society(){
    	return $this->belongsTo('App\Models\Sales', 'id_sociedad');	
    }
}

            