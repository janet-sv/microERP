<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promodetail extends Model
{
    use SoftDeletes;

    public function promotion(){
        return $this->belongsTo('App\Models\Sales\Promotion', 'id_promocion');
    }


}
