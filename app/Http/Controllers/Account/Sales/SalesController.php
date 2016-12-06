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
use App\Models\Account\AccountantSeat;
use App\Models\Account\Stateinvoice;
use App\Models\Account\DetailSales;

use App\Models\Sales\Salesorder;
use App\Models\Sales\Salesorderdetail;
use App\Models\Logistic\Product\Product;
use App\Models\Logistic\ProductCategory\ProductCategory;
use App\Models\Sales\Customer;

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
      /*  
      $salesinvoices = SalesInvoice::
                    select('salesinvoice.id','document_type.name as document','customers.name as client','customers.ruc as ruc','salesinvoice.date_invoice','salesinvoice.number','users.name as user','salesinvoice.date_due','salesinvoice.amount_total_signed','salesinvoice.residual_signed','stateinvoice.name as state','salesinvoice.reference')
                    ->join('customers','customers.id','=','salesinvoice.partner_id')
                    ->join('stateinvoice','stateinvoice.id','=','salesinvoice.state_id')
                    ->join('users','users.id','=','salesinvoice.user_id')
                    ->join('document_type','document_type.id','=','salesinvoice.document_id')
                    ->orderBy('id', 'desc')
                    ->paginate(5);
        */
        $salesinvoices = SalesInvoice::whereIn('document_id', [1, 2])->orderBy('id', 'desc')->paginate(10);   


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
        $Document_type = Document_type::whereNotIn('id', [4, 5,6])->lists('name','id')->prepend('Seleccioname el tipo de documento');
        $users = User::lists('name','id')->prepend('Seleccioname el usuario');
        $state = Stateinvoice::lists('name','id')->prepend('Seleccionar estado');
        //return view('/account/SalesInvoice/create')->with('Partners',$Partners);
           return view('/account/SalesInvoice/create', array('users'=>$users, 'Partners'=>$Partners,'invoices'=>$invoices , 'Document_type'=>$Document_type ,'state'=>$state));
 
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
        
        $id =  $request['tipo_documento'];
        $number=DB::table('document_type')->where('id', $id)->value('numeration');
        $request['number'] = $number;


        $id =  $request['cliente'];
        $empresa=DB::table('partner')->where('id', $id)->value('name');


        $id =  $request['tipo_documento'];


        $code=DB::table('document_type')->where('id', $id)->value('name');
        
        //SalesInvoice::create($request->all());
        $id_cliente = null;
        if( $request['cliente'] != 0)
            $id_cliente = $request['cliente'];
        $salesinvoice                      = new SalesInvoice;        
        $salesinvoice->date_invoice        = $request['fecha_creacion'];            
        $salesinvoice->number          = $request['numeracion'];
        $salesinvoice->date_due            = $request['fecha_vencimiento'];            
        $salesinvoice->amount_total_signed = $request['total_documento_venta'];                        
        $salesinvoice->residual_signed     = $request['total_documento_venta'];                        
        $salesinvoice->subtotal            = $request['sub_total'];                        
        $salesinvoice->igv                 = $request['igv'];                        
        $salesinvoice->partner_id          = $id_cliente;
        $salesinvoice->user_id             = $request['user'];                        
        $salesinvoice->document_id         = $request['tipo_documento'];                        
        $salesinvoice->state_id            = 1;        
        $salesinvoice->id_salesorder       = $request['salesorder'];                             
        $salesinvoice->description         = $request['descripcion'];                    
        $salesinvoice->discount           = $request['descuento_manual'];                                
        $salesinvoice->save();
        
        foreach($request['product'] as $key=> $value){
            $salesinvoicedetail             = new DetailSales;
            $salesinvoicedetail->amount     = $request['cantidad'][$key];
            $salesinvoicedetail->discounts  = $request['descuento'][$key];
            $salesinvoicedetail->unitprice  = $request['precio_unitario'][$key];
            $salesinvoicedetail->total      = $request['total'][$key];            
            $salesinvoicedetail->invoice_id = $salesinvoice->id;
            $salesinvoicedetail->product_id = $request['product'][$key];                        
            $salesinvoicedetail->code = 1607;                                
            $salesinvoicedetail->save();
        } 

        if ( $id == 1 || $id == 2 ){
            $regis= new AccountantSeat;
            $regis->date=$request['fecha_creacion'];
            $regis->code=$code;
            $regis->number=$request['number'];
            $regis->company=$empresa;
            $regis->reference=$request['reference'];
            $regis->diario_id=1;
            $regis->amount=$request['total_documento_venta'];
            $regis->state="Publicado";            
            DB::table('accountantseat')->insert(
            ['date' =>  $regis->date, 'code' => $regis->code,'number' =>  $regis->number, 'company' =>  $regis->company,'reference' => $regis->reference, 'diario_id' =>  $regis->diario_id,'amount' => $regis->amount, 'state' => $regis->state]);
            $SalesInvoiceAux = SalesInvoice::find($salesinvoice->id);
            foreach ($SalesInvoiceAux->detailSales as $key => $detailSale) {
                
            }

        }

        $number = $number + 1;
        DB::table('document_type')
            ->where('id', $id)
            ->update(['numeration' => $number]);

        return redirect()->route('salesinvoice.index')->with('success', 'El documento de venta se ha registrado exitosamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $salesinvoicedetails = DB::table('salesinvoicedetail')
                                ->where('invoice_id', $id)
                                ->get();                                    
        $salesinvoice        = Offer::find($id);

        $data = [
            'salesinvoicedetails'     => $salesinvoicedetails,
            'salesinvoice'            => $salesinvoice,            
        ];
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
        $Document_type = Document_type::whereNotIn('id', [4, 5,6])->lists('name','id')->prepend('Seleccioname el tipo de documento');
        $SalesInvoices = SalesInvoice::FindOrFail($id);
        $state = Stateinvoice::lists('name','id')->prepend('Seleccionar estado');
        /*
        $details = DetailSales::
                    select('salesinvoicedetail.id','salesinvoicedetail.invoice_id','product.name as product','accounts.code as name','salesinvoicedetail.amount','salesinvoicedetail.unitprice','salesinvoicedetail.discounts','salesinvoicedetail.total')
                    ->where('invoice_id','=',  $id)
                   ->join('accounts','accounts.id','=','salesinvoicedetail.code')
                   ->join('product','product.id','=','salesinvoicedetail.product_id')
                    ->paginate(5);
        */
        $details = DetailSales::where('invoice_id', $id)->paginate(10);

       // return view('/account/SalesInvoice/edit');
        return view('/account/SalesInvoice/edit', array('SalesInvoices'=>$SalesInvoices,'users'=>$users, 'Partners'=>$Partners , 'Document_type'=>$Document_type ,'state'=>$state,'details'=>$details ));

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

   public function createFromSalesorder($id)
    {
        $salesorderdetails = DB::table('salesorderdetails')
                                ->where('id_pedido_venta', $id)
                                ->get();                                    
        $salesorder        = Salesorder::find($id);
        $categoryproducts  = ProductCategory::get();        
        $products          = Product::get();                  
        $customers         = Customer::get();
        $document_types    = Document_type::take(3)->get();
        $date              = date("Y-m-d", time());
        if( $salesorder->customer )
            $days = $salesorder->customer->plazo_credito;
        else
            $days = 0;
        $fecha_vencimiento = date("Y-m-d", strtotime($date . '+' . $days . 'day'));
        
        $data = [
            'salesorderdetails' => $salesorderdetails,
            'salesorder'        => $salesorder,
            'categoryproducts'  => $categoryproducts,
            'products'          => $products,            
            'customers'         => $customers,
            'document_types'    => $document_types,
            'fecha_creacion'    => $date,
            'fecha_vencimiento' => $fecha_vencimiento,
        ];

        //dd($data);

        return view('sales.pages.salesdocument.createFromSalesorder', $data);
    }

    public function findNumberDocument(Request $request)
    {
        $id =  $request['id'];

        $document_type = Document_type::find($id);

        $data = [
            'numeracion'    => $document_type->numeration,                                 
        ];      
        
        return response()->json( $data );    

    }

    public function indexSalesDocuments()
    {
        $salesinvoices = SalesInvoice::
                    select('salesinvoice.id','document_type.name as document','partner.name as client','partner.ruc as ruc','salesinvoice.date_invoice','salesinvoice.number','users.name as user','salesinvoice.date_due','salesinvoice.amount_total_signed','salesinvoice.residual_signed','stateinvoice.name as state','salesinvoice.reference')
                    ->join('partner','partner.id','=','salesinvoice.partner_id')
                    ->join('stateinvoice','stateinvoice.id','=','salesinvoice.state_id')
                    ->join('users','users.id','=','salesinvoice.user_id')
                    ->join('document_type','document_type.id','=','salesinvoice.document_id')
                    ->orderBy('id', 'desc')
                    ->paginate(10);
        
        return  view('/sales/pages/salesdocument/index')->with('SalesInvoice',$salesinvoices);
    }

}
