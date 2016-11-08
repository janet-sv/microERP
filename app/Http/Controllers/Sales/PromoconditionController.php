<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales\Promocondition;
use App\Http\Requests\Sales\PromoconditionRequest;
use App\Http\Requests;

class PromoconditionController extends Controller
{
    public function index()
    {
        $promoconditions = Promocondition::orderBy('nombre', 'asc')->get();

        $data = [
            'promoconditions'    =>  $promoconditions,
        ];

        return view('sales.pages.promocondition.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.pages.promocondition.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromoconditionRequest $request)
    {
        try {
            $promocondition = new Promocondition;
            $promocondition->nombre       = $request['nombre'];
            $promocondition->descripcion  = $request['descripcion'];
            $promocondition->cantidad_requerida  = $request['cantidad_requerida'];
            $promocondition->cantidad_descuento  = $request['cantidad_descuento'];
            $promocondition->porcentaje_descuento = $request['porcentaje_descuento'];
            $promocondition->save();

            return redirect()->route('promocondition.index')->with('success', 'La condición de promoción se ha registrado exitosamente');
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
        $promocondition = Promocondition::find($id);

        $data = [
            'promocondition'    =>  $promocondition,
        ];

        return view('sales.pages.promocondition.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $promocondition = Promocondition::find($id);

        $data = [
            'promocondition'      =>  $promocondition,
        ];

        return view('sales.pages.promocondition.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromoconditionRequest $request, $id)
    {
        try {
            $promocondition = Promocondition::find($id);
            $promocondition->nombre       = $request['nombre'];
            $promocondition->descripcion  = $request['descripcion'];
            $promocondition->cantidad_requerida  = $request['cantidad_requerida'];
            $promocondition->cantidad_descuento  = $request['cantidad_descuento'];
            $promocondition->porcentaje_descuento = $request['porcentaje_descuento'];
            $promocondition->save();

            return redirect()->route('promocondition.index')->with('success', 'La condición de promoción se ha actualizado exitosamente');
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
            $promocondition   = Promocondition::find($id);
            $message = "";
            
            $promocondition->delete();

            return redirect()->route('promocondition.index')->with('success', 'La condición de promoción se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
