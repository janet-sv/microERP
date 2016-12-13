<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales\Promocondition;
use App\Models\Sales\Promotion;
use App\Models\Sales\Listprice;
use App\Models\Sales\Promodetail;
use App\Models\Sales\Customer;
use App\Models\Sales\Offer;
use App\Models\Sales\Offerdetail;
use App\Models\Logistic\Product\Product;
use App\Models\Logistic\ProductCategory\ProductCategory;
use App\Http\Requests\Sales\OfferRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class OfferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $offers = Offer::orderBy('numeracion', 'asc')->paginate(10);         

        $date = date("Y-m-d", time());  
        foreach ($offers as $key => $offer) {
            if ( ( $date > $offer->fecha_fin))
                $offer->estado = 0;
        }  
        $data = [
            'offers' =>  $offers,            
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
		$numeracion       = count(Offer::get());
        $numeracion      += +1;
		$customers        = Customer::get();
        $data = [
			'categoryproducts' => $categoryproducts,
			'products'         => $products,
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
    public function store(OfferRequest $request)
    {
        try {
            $id_cliente = null;
            if( $request['cliente'] != 0)
                $id_cliente = $request['cliente'];

            $offer                   = new Offer;
            $offer->estado           = 1;
            $offer->id_sociedad      = 1;
            $offer->numeracion       = $request['numeracion'];
            $offer->id_cliente       = $id_cliente;
            $offer->descripcion      = $request['descripcion'];            
            $offer->fecha_inicio     = $request['fecha_inicio'];
            $offer->fecha_fin        = $request['fecha_fin'];                        
            $offer->descuento_manual = $request['descuento_manual'];                        
            $offer->sub_total        = $request['sub_total'];                        
            $offer->igv              = $request['igv'];                        
            $offer->total            = $request['total_proforma'];                        
            $offer->save();
            
            foreach($request['categoryproduct'] as $key=> $value){
                $offerdetail                  = new Offerdetail;
                $offerdetail->cantidad        = $request['cantidad'][$key];
                $offerdetail->descuento       = $request['descuento'][$key];
                $offerdetail->precio_unitario = $request['precio'][$key];
                $offerdetail->total           = $request['total'][$key];
                //$offerdetail->id_promocion  = $offer->id;
                $offerdetail->id_proforma     = $offer->id;
                $offerdetail->id_producto     = $request['product'][$key];                        
                $offerdetail->save();
            }            
            
            return redirect()->route('offer.index')->with('success', 'La proforma se ha registrado exitosamente');
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
        $offerdetails = DB::table('offerdetails')
                                ->where('id_proforma', $id)
                                ->get();
        $offer = Offer::find($id);                                
        $categoryproducts = ProductCategory::get();        
        $products         = Product::get();
        $customers        = Customer::get();

        $data = [
            'offerdetails'     => $offerdetails,
            'offer'            => $offer,
            'categoryproducts' => $categoryproducts,
            'products'         => $products,
            'customers'        => $customers,
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
        $offerdetails = DB::table('offerdetails')
                                ->where('id_proforma', $id)
                                ->get();
        $offer = Offer::find($id);                                
        $categoryproducts = ProductCategory::get();        
        $products         = Product::get();
        $customers        = Customer::get();

        $data = [
            'offerdetails'     => $offerdetails,
            'offer'            => $offer,
            'categoryproducts' => $categoryproducts,
            'products'         => $products,
            'customers'        => $customers,
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
    public function update(OfferRequest $request, $id)
    {
        try {
            $id_cliente = null;
            if( $request['cliente'] != 0)
                $id_cliente = $request['cliente'];

            $offer = Offer::find($id);            
            $offer->estado           = 1;
            $offer->id_sociedad      = 1;
            $offer->numeracion       = $request['numeracion'];
            $offer->id_cliente       = $id_cliente;
            $offer->descripcion      = $request['descripcion'];            
            $offer->fecha_inicio     = $request['fecha_inicio'];
            $offer->fecha_fin        = $request['fecha_fin'];                        
            $offer->descuento_manual = $request['descuento_manual'];                        
            $offer->sub_total        = $request['sub_total'];                        
            $offer->igv              = $request['igv'];                        
            $offer->total            = $request['total_proforma'];                        
            $offer->save();

            foreach($request['categoryproduct'] as $key=> $value){
                $offerdetail                       = Offerdetail::find($request['idofferdetail'][$key]);
                if ( !$offerdetail )
                    $offerdetail = new Offerdetail;                
                $offerdetail->cantidad        = $request['cantidad'][$key];
                $offerdetail->descuento       = $request['descuento'][$key];
                $offerdetail->precio_unitario = $request['precio'][$key];
                $offerdetail->total           = $request['total'][$key];
                //$offerdetail->id_promocion  = $offer->id;
                $offerdetail->id_proforma     = $offer->id;
                $offerdetail->id_producto     = $request['product'][$key];                        
                $offerdetail->save();
            }  


            return redirect()->route('offer.index')->with('success', 'La promoción se ha actualizado exitosamente');
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
            $offer   = Offer::find($id);
            $message = "";
            
            $offer->delete();

            return redirect()->route('offer.index')->with('success', 'La promoción se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }


    public function getProductsByCategory()
    {
        $offers = Promotion::where('tipo', 1)->orderBy('nombre', 'asc')->get();

        $data = [
            'offers'    =>  $offers,
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
        $date = date("Y-m-d", time());  
        foreach ($promodetails as $key => $promodetail) {
        	if ($promodetail->promotion->tipo == 1 && $promodetail->promotion->promocondition->cantidad_requerida ==  1 
                && ($promodetail->promotion->fecha_fin >=  $date)){
        		$porcentaje_descuento = $promodetail->promotion->promocondition->porcentaje_descuento;
                break;
            }
        }        	
        $listprice = Listprice::where('id_producto', $id)
                                ->where('estado', 1)->get();        
        $precio    = $listprice[0]->precio;
        
        $porcentaje_descuento_cliente = 0;
        if( $cliente )
        	$porcentaje_descuento_cliente = $cliente->porcentaje_descuento;

        $descuento = round(($porcentaje_descuento_cliente + $porcentaje_descuento)*$precio/100,2);

        $data = [
			'precio'    => $precio,						
			'descuento' => $descuento,			
        ];      
        
        return response()->json( $data );         
        
    }

    public function findDiscount(Request $request)
    {
        $id = $request['option'];        
        $idCliente = $request['cliente'];
        $product = Product::find($id);        
        $cliente = Customer::find($idCliente);
        $promodetails = Promodetail::where('id_producto', $id)
                            ->where('cantidad_descuento', 0)
                            ->orderBy('updated_at', 'asc')->get();
        $porcentaje_descuento = 0;
        $date = date("Y-m-d", time());  
        foreach ($promodetails as $key => $promodetail) {
            if ($promodetail->promotion->tipo == 1 && $promodetail->promotion->promocondition->cantidad_requerida ==  1 
                && ($promodetail->promotion->fecha_fin >=  $date)){
                $porcentaje_descuento = $promodetail->promotion->promocondition->porcentaje_descuento;
                break;
            }
        }                   
        
        $porcentaje_descuento_cliente = 0;
        if( $cliente )
            $porcentaje_descuento_cliente = $cliente->porcentaje_descuento;

        $descuento = ($porcentaje_descuento_cliente + $porcentaje_descuento);

        $data = [            
            'descuento' => $descuento,          
        ];      
        
        return response()->json( $data );         
        
    }


    public function copy($id)
    {
        $offerdetails = DB::table('offerdetails')
                                ->where('id_proforma', $id)
                                ->get();
        $offer = Offer::find($id);                                
        $categoryproducts = ProductCategory::get();        
        $products         = Product::get();
        $customers        = Customer::get();
        $numeracion       = count(Offer::get());
        $numeracion      += +1;        

        $data = [
            'offerdetails'     => $offerdetails,
            'offer'            => $offer,
            'categoryproducts' => $categoryproducts,
            'products'         => $products,
            'customers'        => $customers,
            'numeracion'       => $numeracion,
        ];

        return view('sales.pages.offer.copy', $data);
    }
}
