<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promotion extends Model
{
    use SoftDeletes;
    protected $fillable = ['nombre', 'descripcion','tipo', 'fecha_inicio',
    'fecha_fin', 'id_condicion_promocion'];

    public function promocondition(){
    	return $this->belongsTo('App\Models\Sales\Promocondition', 'id_condicion_promocion');	
    }
    
    public function promodetails(){
    	return $this->hasMany('App\Models\Sales\Promodetail', 'id_promocion');	
    }
}
