<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Salesorderdetail extends Model
{
    use SoftDeletes;

   	public function promotion(){
        return $this->belongsTo('App\Models\Sales\Promotion', 'id_promocion');
    }
    public function product(){
        return $this->belongsTo('App\Models\Logistic\Product\Product', 'id_producto');
  	}
  	public function salesorder(){
          return $this->belongsTo('App\Models\Sales\Salesorder', 'id_pedido_venta');
    }
}
