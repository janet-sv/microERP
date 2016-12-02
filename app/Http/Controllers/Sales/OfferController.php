<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales\Promocondition;
use App\Models\Sales\Promotion;
use App\Models\Sales\Promodetail;
use App\Models\Sales\Customer;
use App\Models\Logistic\Product\Product;
use App\Models\Logistic\ProductCategory\ProductCategory;
use App\Http\Requests\Sales\PromotionbygroupRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class OfferController extends Controller
{
    public function index()
    {
        /*        
        $promotionbygroups = DB::table('promodetails')
                            ->join('promotions', 'promodetails.id_promocion', '=', 'promotions.id' )
                            ->join('products', 'promodetails.id_producto', '=', 'products.id')                            
                            ->where('tipo', 2)->orderBy('nombre', 'asc')->paginate(10);
		*/
        $promotionbygroups = null;            
        $data = [
            'promotionbygroups' =>  $promotionbygroups,            
        ];
        
        return view('sales.pages.offer.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
		$categoryproducts = ProductCategory::get();        
		$products         = Product::get();          
		$numeracion       = 1;
		$customers        = Customer::get();
        $data = [
			'categoryproducts' =>  $categoryproducts,
			'products'         =>  $products,
			'numeracion'       => $numeracion,
			'customers'        => $customers,
        ];

        //dd($data);

        return view('sales.pages.offer.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionbygroupRequest $request)
    {
        try {
            $promotion                         = new Promotion;
            $promotion->tipo                   = 2;
            $promotion->nombre                 = $request['nombre'];
            $promotion->descripcion            = $request['descripcion'];            
            $promotion->fecha_inicio           = $request['fecha_inicio'];
            $promotion->fecha_fin              = $request['fecha_fin'];                        
            $promotion->save();

            foreach($request['categoryproduct'] as $key=> $value){
                $promodetail                       = new Promodetail;
                $promodetail->cantidad_descuento   = $request['cantidad_descuento'][$key];
                $promodetail->porcentaje_descuento = $request['porcentaje_descuento'][$key];
                $promodetail->id_promocion         = $promotion->id;
                $promodetail->id_producto          = $request['product'][$key];                        
                $promodetail->save();
            }            

            return redirect()->route('promotionbygroup.index')->with('success', 'La promoción se ha registrado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $promotion = Promotion::find($id);

        $data = [
            'promotion'    =>  $promotion,
        ];

        return view('sales.pages.offer.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promodetails = DB::table('promodetails')
                                ->where('id_promocion', $id)
                                ->get();
        $promotion = Promotion::find($id);                                
        $categoryproducts = ProductCategory::get();        
        $products         = Product::get();

        $data = [
            'promodetails'     => $promodetails,
            'promotion'        => $promotion,
            'categoryproducts' => $categoryproducts,
            'products'         => $products,
        ];

        return view('sales.pages.offer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromotionbygroupRequest $request, $id)
    {
        try {
            $promotion = Promotion::find($id);            
            $promotion->tipo                   = 2;
            $promotion->nombre                 = $request['nombre'];
            $promotion->descripcion            = $request['descripcion'];            
            $promotion->fecha_inicio           = $request['fecha_inicio'];
            $promotion->fecha_fin              = $request['fecha_fin'];                        
            $promotion->save();

            foreach($request['categoryproduct'] as $key=> $value){
                $promodetail                       = Promodetail::find($request['idpromodetail'][$key]);
                if ( !$promodetail )
                    $promodetail = new Promodetail;
                $promodetail->cantidad_descuento   = $request['cantidad_descuento'][$key];
                $promodetail->porcentaje_descuento = $request['porcentaje_descuento'][$key];
                $promodetail->id_promocion         = $promotion->id;
                $promodetail->id_producto          = $request['product'][$key];                        
                $promodetail->save();
            }  


            return redirect()->route('promotionbygroup.index')->with('success', 'La promoción se ha actualizado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $promotion   = Promotion::find($id);
            $message = "";
            
            $promotion->delete();

            return redirect()->route('promotionbygroup.index')->with('success', 'La promoción se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }


    public function getProductsByCategory()
    {
        $promotionbygroups = Promotion::where('tipo', 1)->orderBy('nombre', 'asc')->get();

        $data = [
            'promotionbygroups'    =>  $promotionbygroups,
        ];

        return null;

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

    public function findProductsInEdit(Request $request)
    {
        $id = $request['option'];
        $idProducto = $request['idProducto'];
        
        if( $id == 0 )  
            $html       = '<option value>Seleccione Producto</option>';
        else{
            $products = ProductCategory::find($id)->products;

            //$html       = '<option value>Seleccione Producto</option>';
            $html    = '';
            $options = '';

            foreach ($products as $product) {
                $options = $options . '<option value=' . $product->id;
                if ($product->id == $idProducto)
                    $options = $options . 'selected';
                $options = $options . '>' . $product->name . '</option>';
            }
            $html       = $html . $options;
        }

        
        return response()->json(['html' => $html]);        
        
    }

    public function findPrice(Request $request)
    {
        $id = $request['option'];        
        $idCliente = $request['cliente'];
        $product = Product::find($id);        
        $cliente = Customer::find($idCliente);
        $promodetails = Promodetail::where('id_producto', $id)
        					->where('cantidad_descuento', 0)
        					->orderBy('updated_at', 'asc')->get();
		$porcentaje_descuento = 0;
        foreach ($promodetails as $key => $promodetail) {
        	if ($promodetail->promotion->tipo == 1 && $promodetail->promotion->promocondition->cantidad_requerida ==  1)
        		$porcentaje_descuento = $promodetail->promotion->promocondition->porcentaje_descuento;
        }        	

        $precio  = $product->listprices[count($product->listprices)-1]->precio ;
        $porcentaje_descuento_cliente = 0;
        if( $cliente )
        	$porcentaje_descuento_cliente = $cliente->porcentaje_descuento;

        $descuento = round(($porcentaje_descuento_cliente + $porcentaje_descuento)*$precio/100,1);

        $data = [
			'precio'    => $precio,						
			'descuento' => $descuento,			
        ];      
        
        return response()->json( $data );         
        
    }
}
