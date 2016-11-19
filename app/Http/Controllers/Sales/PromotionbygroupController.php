<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales\Promocondition;
use App\Models\Sales\Promotion;
use App\Http\Requests\Sales\PromoconditionRequest;
use App\Http\Requests;

class PromotionbygroupController extends Controller
{
    public function index()
    {
        $promotionbygroups = Promotion::where('tipo', 2)->orderBy('nombre', 'asc')->paginate(10);

        $data = [
            'promotionbygroups'    =>  $promotionbygroups,
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
        $promoconditions  = Promocondition::get();
        $categoryproducts = Promocondition::get();        
        $products         = Promocondition::get();                

        $data = [
            'promoconditions'  =>  $promoconditions,
            'categoryproducts' =>  $categoryproducts,
            'products'         =>  $products,
        ];
        return view('sales.pages.promotion.bygroup.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromotionRequest $request)
    {
        try {
            $promotion                         = new Promotion;
            $promotion->tipo                   = 1;
            $promotion->nombre                 = $request['nombre'];
            $promotion->descripcion            = $request['descripcion'];
            $promotion->id_condicion_promocion = $request['direccion'];            
            $promotion->fecha_inicio           = $request['fecha_inicio'];
            $promotion->fecha_fin              = $request['fecha_fin'];            
            $promotion->save();

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
        $promotion = Promotion::find($id);

        $data = [
            'promotion'      =>  $promotion,
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
    public function update(PromotionRequest $request, $id)
    {
        try {
            $promotion = Promotion::find($id);            
            $promotion->tipo                   = 1;
            $promotion->nombre                 = $request['nombre'];
            $promotion->descripcion            = $request['descripcion'];
            $promotion->id_condicion_promocion = $request['direccion'];            
            $promotion->fecha_inicio           = $request['fecha_inicio'];
            $promotion->fecha_fin              = $request['fecha_fin'];            
            $promotion->save();

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
}
