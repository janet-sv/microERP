<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales\Customer;
use App\Http\Requests\Sales\CustomerRequest;
use App\Http\Requests;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::orderBy('nombre', 'asc')->get();

        $data = [
            'customers'    =>  $customers,
        ];

        return view('sales.pages.customer.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sales.pages.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        try {
            $customer                       = new Customer;
            $customer->tipo_contribuyente   = $request['tipo_contribuyente'];
            $customer->nombre               = $request['nombre'];
            $customer->direccion            = $request['direccion'];
            $customer->apellido_paterno     = $request['apellido_paterno'];
            $customer->apellido_materno     = $request['apellido_materno'];
            $customer->sexo                 = $request['sexo'];
            $customer->tipo_documento       = $request['tipo_documento'];
            $customer->numero_documento     = $request['numero_documento'];
            $customer->ruc                  = $request['ruc'];
            $customer->razon_social         = $request['razon_social'];
            $customer->plazo_credito        = $request['plazo_credito'];
            $customer->porcentaje_descuento = $request['porcentaje_descuento'];
            $customer->linea_credito        = $request['linea_credito'];
            $customer->estado               = 1;
            $customer->id_sociedad          = 1;
            $customer->save();

            return redirect()->route('customer.index')->with('success', 'El cliente se ha registrado exitosamente');
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
        $customer = Customer::find($id);

        $data = [
            'customer'    =>  $customer,
        ];

        return view('sales.pages.customer.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        $data = [
            'customer'      =>  $customer,
        ];

        return view('sales.pages.customer.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        try {
            $customer = Customer::find($id);
            $customer->tipo_contribuyente   = $request['tipo_contribuyente'];
            $customer->nombre               = $request['nombre'];
            $customer->direccion            = $request['direccion'];
            $customer->apellido_paterno     = $request['apellido_paterno'];
            $customer->apellido_materno     = $request['apellido_materno'];
            $customer->sexo                 = $request['sexo'];
            $customer->tipo_documento       = $request['tipo_documento'];
            $customer->numero_documento     = $request['numero_documento'];
            $customer->ruc                  = $request['ruc'];
            $customer->razon_social         = $request['razon_social'];
            $customer->plazo_credito        = $request['plazo_credito'];
            $customer->porcentaje_descuento = $request['porcentaje_descuento'];
            $customer->linea_credito        = $request['linea_credito'];
            $customer->estado               = $request['estado'];            
            $customer->save();

            return redirect()->route('customer.index')->with('success', 'El cliente se ha actualizado exitosamente');
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
            $customer   = Customer::find($id);
            $message = "";
            
            $customer->delete();

            return redirect()->route('customer.index')->with('success', 'El cliente se ha eliminado exitosamente');
        } catch (Exception $e) {
            return redirect()->back()->with('warning', 'Ocurrió un error al hacer esta acción');
        }
    }
}
