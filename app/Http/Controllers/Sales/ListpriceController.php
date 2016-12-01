<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Logistic\Product\Product;
use App\Models\Logistic\ProductCategory\ProductCategory;
use App\Models\Sales\Listprice;
use App\Http\Requests\Sales\ListpriceRequest;
use App\Http\Requests;

class ListpriceController extends Controller
{
    public function index()
    {
        $listprices = Listprice::where('estado', 1)->orderBy('id_producto', 'asc')->paginate(10);

        $data = [
            'listprices'    =>  $listprices,
        ];

        return view('sales.pages.listprice.index', $data);

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
        return view('sales.pages.listprice.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\ListpriceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListpriceRequest $request)
    {
    	$id_producto = $request['producto'];
		$listpriceAux = Listprice::where('id_producto', $id_producto)
								->where('estado',1)->first();
		
		
        try {
        	if ( count($listpriceAux) ){			
				$listpriceNew = Listprice::find($listpriceAux->id);
	            $listpriceNew->estado = 0;	            
	            $listpriceNew->save();	            	        
			}		
			$listprice              = new Listprice;
			$listprice->precio      = $request['precio'];
			$listprice->estado      = 1;
			$listprice->id_producto = $id_producto;
			$listprice->save();
            return redirect()->route('listprice.index')->with('success', 'El precio de lista se ha registrado exitosamente');
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
        $listprice = Listprice::find($id);

        $data = [
            'listprice'    =>  $listprice,
        ];

        return view('sales.pages.listprice.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listprice = Listprice::find($id);        
        $categoryproducts = ProductCategory::get();        
        $products         = Product::get();       

        $data = [
            'listprice'      =>  $listprice,            
            'categoryproducts' =>  $categoryproducts,
            'products'         =>  $products,
        ];

        return view('sales.pages.listprice.edit', $data);
    }

   
    public function update(ListpriceRequest $request, $id)
    {
        try {
            $listprice = Listprice::find($id);                        
            $listprice->precio      = $request['precio'];
			$listprice->estado      = 1;
			$listprice->id_producto = $id_producto;
			$listprice->save();

            return redirect()->route('listprice.index')->with('success', 'El precio de lista se ha actualizado exitosamente');
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
            $listprice   = Listprice::find($id);
            $message = "";
            
            $listprice->delete();

            return redirect()->route('listprice.index')->with('success', 'El precio de lista se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
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
