<?php

namespace App\Models\Logistic\ProductCategory;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';

    public function products()
    {
        return $this->hasMany('App\Models\Logistic\Product\Product', 'id_category');
    }
}
