<?php

namespace App\Models\Logistic\Section;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $table = 'sections';

    public function warehouse()
    {
        return $this->belongsTo('App\Models\Logistic\Warehouse\Warehouse', 'id_warehouse');
    }
}
