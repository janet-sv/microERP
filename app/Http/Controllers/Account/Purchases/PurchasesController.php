<?php

namespace App\Http\Controllers\Account\Purchases;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Provider;
use App\Models\Account\PurchasesInvoice;
use App\User;


class PurchasesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $purchasesinvoices = PurchasesInvoice::
                    select('purchasesinvoice.id','provider.name as provider','purchasesinvoice.date_invoice','purchasesinvoice.number','purchasesinvoice.date_due','purchasesinvoice.amount_total_signed','purchasesinvoice.residual_signed','purchasesinvoice.state')
                    ->join('provider','provider.id','=','purchasesinvoice.provider_id')
                    ->paginate(5);
        return view('/account/ShoppingInvoice/index')->with('PurchasesInvoice',$purchasesinvoices);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
        $Providers = Provider::lists('name','id')->prepend('Seleccioname el proveedor');
        return view('/account/ShoppingInvoice/create', array('Providers'=>$Providers ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PurchasesInvoice::create($request->all());
        return redirect()->route('FacturasProveedores.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $PurchasesInvoices = PurchasesInvoice::FindOrFail($id);
        return view('/account/ShoppingInvoice/show', array('PurchasesInvoices'=>$PurchasesInvoices));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $Providers = Provider::lists('name','id')->prepend('Seleccioname el proveedor');
        $PurchasesInvoices = PurchasesInvoice::FindOrFail($id);

        return view('/account/ShoppingInvoice/edit', array('PurchasesInvoices'=>$PurchasesInvoices,'Providers'=>$Providers ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $PurchasesInvoices = PurchasesInvoice::FindOrFail($id);
        $input = $request->all();
        $PurchasesInvoices->fill($input)->save();
        return redirect()->route('FacturasProveedores.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $PurchasesInvoices = PurchasesInvoice::FindOrFail($id);
        $PurchasesInvoices->delete();
        return redirect()->route('FacturasProveedores.index');
                
    }

}
