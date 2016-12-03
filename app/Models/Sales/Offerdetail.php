<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Offerdetail extends Model
{
   	use SoftDeletes;

   	public function promotion(){
        return $this->belongsTo('App\Models\Sales\Promotion', 'id_promocion');
    }
    public function product(){
        return $this->belongsTo('App\Models\Logistic\Product\Product', 'id_producto');
	}
	public function offer(){
        return $this->belongsTo('App\Models\Sales\Offer', 'id_offer');
    }
}
