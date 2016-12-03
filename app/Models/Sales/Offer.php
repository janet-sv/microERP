<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offer extends Model
{
    use SoftDeletes;

    public function offerdetails(){
    	return $this->hasMany('App\Models\Sales\Offerdetail', 'id_proforma');	
    }

    public function society(){
    	return $this->belongsTo('App\Models\Sales\Society', 'id_sociedad');	
    }

    public function customer(){
    	return $this->belongsTo('App\Models\Sales\Customer', 'id_cliente');	
    }
   	
}
