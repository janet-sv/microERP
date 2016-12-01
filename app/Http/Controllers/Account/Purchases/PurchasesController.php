<?php

namespace App\Http\Controllers\Account\Purchases;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Provider;
use App\Models\Account\PurchasesInvoice;
use App\Models\Account\Document_type;
use App\User;
use DB; 

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
                    select('purchasesinvoice.id','document_type.name as document','provider.name as provider','provider.ruc as ruc','purchasesinvoice.date_invoice','purchasesinvoice.number','purchasesinvoice.date_due','purchasesinvoice.amount_total_signed','purchasesinvoice.residual_signed','purchasesinvoice.state','purchasesinvoice.reference')
                    ->join('provider','provider.id','=','purchasesinvoice.provider_id')
                    ->join('document_type','document_type.id','=','purchasesinvoice.document_id')
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
         $invoices = DB::table('purchasesinvoice')->count();
         $Document_type = Document_type::whereNotIn('id', [1, 2])->lists('name','id')->prepend('Seleccioname el tipo de documento');
         $Providers = Provider::lists('name','id')->prepend('Seleccioname el proveedor');

      return view('/account/ShoppingInvoice/create', array('Providers'=>$Providers, 'invoices'=>$invoices,  'Document_type'=>$Document_type  ));
    }

     public function findnumber(Request $request, $id)
    {

           if($request->ajax()){
               
               $number=DB::table('document_type')->where('id', $id)->value('numeration');
            
            return response()->json($number);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id =  $request['document_id'];
        $number=DB::table('document_type')->where('id', $id)->value('numeration');
        $request['number'] = $number;

        PurchasesInvoice::create($request->all());

            $number = $number + 1;
        DB::table('document_type')
            ->where('id', $id)
            ->update(['numeration' => $number]);

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
        $Document_type = Document_type::whereNotIn('id', [1, 2])->lists('name','id')->prepend('Seleccioname el tipo de documento');
        $PurchasesInvoices = PurchasesInvoice::FindOrFail($id);

        return view('/account/ShoppingInvoice/edit', array('PurchasesInvoices'=>$PurchasesInvoices,'Providers'=>$Providers, 'Document_type'=>$Document_type ));

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
