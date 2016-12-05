<?php

namespace App\Models\Sales;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Logistic\Product\Product;
use App\Models\Logistic\ProductCategory\ProductCategory;

class Listprice extends Model
{
    use SoftDeletes;

    public function product(){
        return $this->belongsTo('App\Models\Logistic\Product\Product', 'id_producto');
    }

    
    static public function getListpricesByDates($filters) {
    
		$queryListprice   = Listprice::query();        
		$queryProducts = Product::query();

	    if ($filters["beginDate"] != "" && $filters["endDate"] != "") {
	        $queryListprice = $queryListprice->whereBetween("updated_at", array($filters["beginDate"], $filters["endDate"]));
	    }

	    if ($filters["id_product"] != 0 ){
	    	$queryListprice = $queryListprice->where("id_producto", $filters["id_product"]);	    	
	    	return $queryListprice->orderBy("estado", 'desc');
	    }

	    if ($filters["id_categoryproduct"] != 0){
	    	$queryProducts = $queryProducts->where("id_category", $filters["id_categoryproduct"])->get();
		    $id_products = array();
		    foreach ($queryProducts as $product) {
		        if ($product) {
		            array_push($id_products, $product->id);
		        }
		    }	    	
	    	$queryListprice = $queryListprice->whereIn("id_producto", $id_products);
	    }

	    $queryListprice = $queryListprice->where("estado", 1);

	    return $queryListprice->orderBy("updated_at", 'desc');

	}
}
