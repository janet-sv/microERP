<?php

namespace App\Models\Logistic\Warehouse;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouses';

    public function sections()
    {
        return $this->hasMany('App\Models\Logistic\Section\Section', 'id_warehouse');
    }
}
