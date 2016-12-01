<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales\Promocondition;
use App\Models\Sales\Promotion;
use App\Models\Sales\Promodetail;
use App\Models\Logistic\Product\Product;
use App\Models\Logistic\ProductCategory\ProductCategory;
use App\Http\Requests\Sales\PromotionbygroupRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class PromotionbygroupController extends Controller
{
    public function index()
    {
                
        $promotionbygroups = DB::table('promodetails')
                            ->join('promotions', 'promodetails.id_promocion', '=', 'promotions.id' )
                            ->join('products', 'promodetails.id_producto', '=', 'products.id')                            
                            ->where('tipo', 2)->orderBy('nombre', 'asc')->paginate(10);

        $data = [
            'promotionbygroups' =>  $promotionbygroups,            
        ];
        
        return view('sales.pages.promotion.bygroup.index', $data);

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

        $data = [
            'categoryproducts' =>  $categoryproducts,
            'products'         =>  $products,
        ];

        //dd($data);

        return view('sales.pages.promotion.bygroup.create', $data);
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

        return view('sales.pages.promotion.bygroup.show', $data);
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

        return view('sales.pages.promotion.bygroup.edit', $data);
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
}
