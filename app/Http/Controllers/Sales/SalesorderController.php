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

class SalesorderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $salesorders = Salesorder::orderBy('numeracion', 'asc')->paginate(10);         

        $data = [
            'salesorders' =>  $salesorders,            
        ];
        
        return view('sales.pages.salesorder.index', $data);

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
		$numeracion       = count(Salesorder::get());
        $numeracion      += +1;
		$customers        = Customer::get();
        $data = [
			'categoryproducts' => $categoryproducts,
			'products'         => $products,
			'numeracion'       => $numeracion,
			'customers'        => $customers,
        ];

        //dd($data);

        return view('sales.pages.salesorder.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesorderRequest $request)
    {
        try {
            $id_cliente = null;
            if( $request['cliente'] != 0)
                $id_cliente = $request['cliente'];
            $salesorder                   = new Salesorder;
            $salesorder->estado           = 1;
            $salesorder->id_sociedad      = 1;
            $salesorder->numeracion       = $request['numeracion'];
            $salesorder->id_cliente       = $id_cliente;
            $salesorder->descripcion      = $request['descripcion'];            
            $salesorder->fecha_creacion   = $request['fecha_creacion'];            
            $salesorder->descuento_manual = $request['descuento_manual'];                        
            $salesorder->sub_total        = $request['sub_total'];                        
            $salesorder->igv              = $request['igv'];                        
            $salesorder->total            = $request['total_pedido_venta'];                        
            $salesorder->save();
            
            foreach($request['categoryproduct'] as $key=> $value){
                $salesorderdetail                     = new Salesorderdetail;
                $salesorderdetail->cantidad           = $request['cantidad'][$key];
                $salesorderdetail->descuento          = $request['descuento'][$key];
                $salesorderdetail->precio_unitario    = $request['precio'][$key];
                $salesorderdetail->total              = $request['total'][$key];
                //$salesorderdetail->id_promocion     = $salesorder->id;
                $salesorderdetail->id_pedido_venta    = $salesorder->id;
                $salesorderdetail->id_producto        = $request['product'][$key];                        
                $salesorderdetail->save();
            }            
            
            return redirect()->route('salesorder.index')->with('success', 'El pedido de venta se ha registrado exitosamente');
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
        $salesorder = Salesorder::find($id);

        $data = [
            'salesorder'    =>  $salesorder,
        ];

        return view('sales.pages.salesorder.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $salesorderdetails = DB::table('salesorderdetails')
                                ->where('id_pedido_venta', $id)
                                ->get();
        $salesorder       = Salesorder::find($id);                                
        $categoryproducts = ProductCategory::get();        
        $products         = Product::get();
        $customers        = Customer::get();

        $data = [
            'salesorderdetails' => $salesorderdetails,
            'salesorder'        => $salesorder,
            'categoryproducts'  => $categoryproducts,
            'products'          => $products,
            'customers'         => $customers,
        ];

        return view('sales.pages.salesorder.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SalesorderRequest $request, $id)
    {
        try {
            $id_cliente = null;
            if( $request['cliente'] != 0)
                $id_cliente = $request['cliente'];

            $salesorder = Salesorder::find($id);            
            $salesorder->estado           = 1;
            $salesorder->id_sociedad      = 1;
            $salesorder->numeracion       = $request['numeracion'];
            $salesorder->id_cliente       = $id_cliente;
            $salesorder->descripcion      = $request['descripcion'];            
            $salesorder->fecha_creacion   = $request['fecha_creacion'];            
            $salesorder->descuento_manual = $request['descuento_manual'];                        
            $salesorder->sub_total        = $request['sub_total'];                        
            $salesorder->igv              = $request['igv'];                        
            $salesorder->total            = $request['total_pedido_venta'];                        
            $salesorder->save();

            foreach($request['categoryproduct'] as $key=> $value){
                $salesorderdetail                       = Salesorderdetail::find($request['idsalesorderdetail'][$key]);
                if ( !$salesorderdetail )
                    $salesorderdetail = new Salesorderdetail;                
                $salesorderdetail->cantidad        = $request['cantidad'][$key];
                $salesorderdetail->descuento       = $request['descuento'][$key];
                $salesorderdetail->precio_unitario = $request['precio'][$key];
                $salesorderdetail->total           = $request['total'][$key];
                //$salesorderdetail->id_promocion  = $salesorder->id;
                $salesorderdetail->id_pedido_venta = $salesorder->id;
                $salesorderdetail->id_producto     = $request['product'][$key];                        
                $salesorderdetail->save();
            }  


            return redirect()->route('salesorder.index')->with('success', 'El pedido de venta se ha actualizado exitosamente');
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
            $salesorder   = Promotion::find($id);
            $message = "";
            
            $salesorder->delete();

            return redirect()->route('salesorder.index')->with('success', 'El pedido de venta se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }


    public function getProductsByCategory()
    {
        $salesorders = Promotion::where('tipo', 1)->orderBy('nombre', 'asc')->get();

        $data = [
            'salesorders'    =>  $salesorders,
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

    public function createFromOffer($id)
    {
        $offerdetails = DB::table('offerdetails')
                                ->where('id_proforma', $id)
                                ->get();                                    
        $offer            = Offer::find($id);
        $categoryproducts = ProductCategory::get();        
        $products         = Product::get();          
        $numeracion       = count(Salesorder::get());
        $numeracion      += +1;
        $customers        = Customer::get();
        $data = [
            'offerdetails'     => $offerdetails,
            'offer'            => $offer,
            'categoryproducts' => $categoryproducts,
            'products'         => $products,
            'numeracion'       => $numeracion,
            'customers'        => $customers,
        ];

        //dd($data);

        return view('sales.pages.salesorder.createFromOffer', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromOffer(SalesorderRequest $request)
    {
        try {
            $id_cliente = null;
            if( $request['cliente'] != 0)
                $id_cliente = $request['cliente'];
            $salesorder                   = new Salesorder;
            $salesorder->estado           = 1;
            $salesorder->id_sociedad      = 1;
            $salesorder->numeracion       = $request['numeracion'];
            $salesorder->id_cliente       = $id_cliente;
            $salesorder->descripcion      = $request['descripcion'];            
            $salesorder->fecha_creacion   = $request['fecha_creacion'];            
            $salesorder->descuento_manual = $request['descuento_manual'];                        
            $salesorder->sub_total        = $request['sub_total'];                        
            $salesorder->igv              = $request['igv'];                        
            $salesorder->total            = $request['total_pedido_venta'];                        
            $salesorder->save();
            
            foreach($request['categoryproduct'] as $key=> $value){
                $salesorderdetail                     = new Salesorderdetail;
                $salesorderdetail->cantidad           = $request['cantidad'][$key];
                $salesorderdetail->descuento          = $request['descuento'][$key];
                $salesorderdetail->precio_unitario    = $request['precio'][$key];
                $salesorderdetail->total              = $request['total'][$key];
                //$salesorderdetail->id_promocion     = $salesorder->id;
                $salesorderdetail->id_pedido_venta    = $salesorder->id;
                $salesorderdetail->id_producto        = $request['product'][$key];                        
                $salesorderdetail->save();
            }            
            
            return redirect()->route('salesorder.index')->with('success', 'El pedido de venta se ha registrado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
