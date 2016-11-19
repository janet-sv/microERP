<?php

namespace App\Models\Logistic\Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    public function category() 
    {
    	return $this->belongsTo('App\Model\Logistic\ProductCategory\ProductCategory', 'id_category');
    }

    public function trademark() 
    {
    	return $this->belongsTo('App\Model\Purchase\Trademark\Trademark', 'id_trademark');
    }
}
