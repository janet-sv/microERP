<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales\Promocondition;
use App\Models\Sales\Promotion;
use App\Models\Sales\Listprice;
use App\Models\Sales\Promodetail;
use App\Models\Sales\Customer;
use App\Models\Sales\Salesorder;
use App\Models\Sales\Salesorderdetail;
use App\Models\Sales\Offer;
use App\Models\Sales\Offerdetail;
use App\Models\Logistic\Product\Product;
use App\Models\Logistic\ProductCategory\ProductCategory;
use App\Http\Requests\Sales\SalesorderRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class ReportController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function sales()
    {
        $listprices = Listprice::where('estado', 1)->orderBy('id_producto', 'asc')->paginate(10);

        $data = [
            'listprices'    =>  $listprices,
        ];

        return view('sales.pages.listprice.index', $data);

    }
    
    public function rotation()
    {
        $listprices = Listprice::where('estado', 1)->orderBy('id_producto', 'asc')->paginate(10);

        $data = [
            'listprices'    =>  $listprices,
        ];

        return view('sales.pages.listprice.index', $data);

    }
    
    public function listprice(Request $request)
    {
    	$categoryproducts = ProductCategory::get();        
		$products         = Product::get(); 

        $dateOriginalFormat = $request['beginDate'];
        if ($dateOriginalFormat)
            $beginDate = date("Y-m-d", strtotime($dateOriginalFormat));
        else
            $beginDate = "";
        $dateOriginalFormat = $request['endDate'];
        if ($dateOriginalFormat)
            $endDate = date("Y-m-d", strtotime($dateOriginalFormat . '+1 day'));
        else
            $endDate = "";
        $id_categoryproduct = $request['categoryproduct'];
        $id_product 		= $request['product'];        
        $filters = [
			"beginDate"          => $beginDate,
			"endDate"            => $endDate,
			"id_categoryproduct" => $id_categoryproduct,
			"id_product"         => $id_product,
        ];

        $listprices = Listprice::getListpricesByDates($filters)->paginate(10);
        $listprices->setPath('?beginDate=' . $beginDate . '&endDate=' . $endDate . '&categoryproduct=' . $id_categoryproduct . '&product=' . $id_product);

        $data = [
        	'categoryproducts' => $categoryproducts,
			'products'         => $products,
            'listprices'       => $listprices,
        ];

        return view('sales.pages.report.listprice', $data);

    }

    public function findProducts(Request $request)
    {
        $id = $request['option'];
        
        if( $id == 0 )  
            $html       = '<option value>Seleccione Producto</option>';
        else{
            $products = ProductCategory::find($id)->products;

            $html       = '<option value>Seleccione Producto</option>';

            $options    = '';

            foreach ($products as $product) {
                $options = $options . '<option value=' . $product->id . '>' . $product->name . '</option>';        
            }
            $html       = $html . $options;
        }

        
        return response()->json(['html' => $html]);        
        
    }
}
