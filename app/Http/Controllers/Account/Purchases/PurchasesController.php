<?php

namespace App\Http\Controllers\Account\Purchases;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
      $salesinvoices = SalesInvoice::
                    select('salesinvoice.id','partner.name as client','salesinvoice.date_invoice','salesinvoice.number','users.name as user','salesinvoice.date_due','salesinvoice.amount_total_signed','salesinvoice.residual_signed','salesinvoice.state')
                    ->join('partner','partner.id','=','salesinvoice.partner_id')
                    ->join('users','users.id','=','salesinvoice.user_id')
                    ->paginate(5);
        return view('/account/SalesInvoice/index')->with('SalesInvoice',$salesinvoices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        //

        $Partners = Partner::lists('name','id')->prepend('Seleccioname la cliente');
        $users = User::lists('name','id')->prepend('Seleccioname el usuario');
        //return view('/account/SalesInvoice/create')->with('Partners',$Partners);
           return view('/account/SalesInvoice/create', array('users'=>$users, 'Partners'=>$Partners ));
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SalesInvoice::create($request->all());
        return redirect()->route('FacturasClientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $SalesInvoices = SalesInvoice::FindOrFail($id);
        return view('FacturasClientes.show')->with('SalesInvoices',$SalesInvoices);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Partners = Partner::lists('name','id')->prepend('Seleccioname la cliente');
        $users = User::lists('name','id')->prepend('Seleccioname el usuario');
        $SalesInvoices = SalesInvoice::FindOrFail($id);

       // return view('/account/SalesInvoice/edit');
        return view('/account/SalesInvoice/edit', array('SalesInvoices'=>$SalesInvoices,'users'=>$users, 'Partners'=>$Partners ));

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
        //
 $SalesInvoices = SalesInvoice::FindOrFail($id);
        $input = $request->all();
        $SalesInvoices->fill($input)->save();
        return redirect()->route('FacturasClientes.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $SalesInvoices = SalesInvoices::FindOrFail($id);
        $SalesInvoices->delete();
        return redirect()->route('FacturasClientes.index');
                
    }

}
