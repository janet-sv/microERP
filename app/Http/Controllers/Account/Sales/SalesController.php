<?php

namespace App\Http\Controllers\Account\Sales;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Partner;
use App\Models\Account\SalesInvoice;
use App\Models\Account\Document_type;
use App\User;
use DB; 
use Input;


class SalesController extends Controller
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
                    select('salesinvoice.id','document_type.name as document','partner.name as client','partner.ruc as ruc','salesinvoice.date_invoice','salesinvoice.number','users.name as user','salesinvoice.date_due','salesinvoice.amount_total_signed','salesinvoice.residual_signed','salesinvoice.state','salesinvoice.reference')
                    ->join('partner','partner.id','=','salesinvoice.partner_id')
                    ->join('users','users.id','=','salesinvoice.user_id')
                    ->join('document_type','document_type.id','=','salesinvoice.document_id')
                    ->orderBy('id', 'desc')
                    ->paginate(5);
        
        return  view('/account/SalesInvoice/index')->with('SalesInvoice',$salesinvoices);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
        $invoices = DB::table('salesinvoice')->count();
        $Partners = Partner::lists('name','id')->prepend('Seleccione al cliente');
        $Document_type = Document_type::whereNotIn('id', [3, 4])->lists('name','id')->prepend('Seleccioname el tipo de documento');
        $users = User::lists('name','id')->prepend('Seleccioname el usuario');
        //return view('/account/SalesInvoice/create')->with('Partners',$Partners);
           return view('/account/SalesInvoice/create', array('users'=>$users, 'Partners'=>$Partners,'invoices'=>$invoices , 'Document_type'=>$Document_type ));
 
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

        SalesInvoice::create($request->all());
        
        $number = $number + 1;
        DB::table('document_type')
            ->where('id', $id)
            ->update(['numeration' => $number]);

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
        $SalesInvoices = SalesInvoice::FindOrFail($id);

        return view('/account/SalesInvoice/show', array('SalesInvoices'=>$SalesInvoices));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       

        $Partners = Partner::lists('name','id')->prepend('Seleccioname la cliente');
        $users = User::lists('name','id')->prepend('Seleccioname el usuario');
        $Document_type = Document_type::whereNotIn('id', [3, 4])->lists('name','id')->prepend('Seleccioname el tipo de documento');
        $SalesInvoices = SalesInvoice::FindOrFail($id);

       // return view('/account/SalesInvoice/edit');
        return view('/account/SalesInvoice/edit', array('SalesInvoices'=>$SalesInvoices,'users'=>$users, 'Partners'=>$Partners , 'Document_type'=>$Document_type  ));

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
        
         $SalesInvoices = SalesInvoice::FindOrFail($id);
        $SalesInvoices->delete();
        return redirect()->route('FacturasClientes.index');
                
    }

   
}
