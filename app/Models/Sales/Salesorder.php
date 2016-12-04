<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salesorder extends Model
{
    use SoftDeletes;

    public function salesorderdetails(){
    	return $this->hasMany('App\Models\Sales\Salesorderdetail', 'id_pedido_venta');	
    }

    public function society(){
    	return $this->belongsTo('App\Models\Sales\Society', 'id_sociedad');	
    }

    public function customer(){
    	return $this->belongsTo('App\Models\Sales\Customer', 'id_cliente');	
    }
}
