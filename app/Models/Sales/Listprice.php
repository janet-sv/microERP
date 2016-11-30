<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listprice extends Model
{
    use SoftDeletes;
    public function product(){
        return $this->belongsTo('App\Models\Logistic\Product\Product', 'id_producto');
    }
}
