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
use App\Models\Account\AccountantSeat;
use App\Models\Account\Stateinvoice;

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

         $purchasesinvoices = PurchasesInvoice::whereIn('document_id', [4, 5])->orderBy('id', 'desc')->paginate(10);
         return  view('/account/PurchaseInvoice/index')->with('PurchasesInvoice',$purchasesinvoices);
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
         $Document_type = Document_type::whereNotIn('id', [4, 5, 6])->lists('name','id')->prepend('Seleccioname el tipo de documento');
         $Providers = Provider::lists('name','id')->prepend('Seleccionar el proveedor');
         $state = Stateinvoice::lists('name','id')->prepend('Seleccionar estado');

         return view('/account/ShoppingInvoice/create', array('Providers'=>$Providers, 'invoices'=>$invoices,  'Document_type'=>$Document_type , 'state'=>$state  ));

    }

    public function findnumber(Request $request, $id)
      {

             if($request->ajax()){

                 $number=DB::table('paymentmethod')->where('id', $id)->value('numeration');
                 return response()->json($number);
             }
      }

      public function findnumbernc(Request $request, $id)
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
         //$id =  $request['tipo_documento'];
       $id = $request->input('document_id');
       if ($id == null) {
           $id =  $request['tipo_documento'];
       }
       $number=DB::table('document_type')->where('id', $id)->value('numeration');
         //$id =  Input::get('document_idnc');
         //$id = $request->input('document_idnc', '2');
         //dd($request['reference']);

      if ($id == 4 || $id == 6 ) { //4=Factura Compra /6=Boleta Compra

         $cuenta = 1223; //se redirecciona a esta cuenta en la tabla
         $cuentaigv = 890;
         $cuentatotal = 965;//116
         $aux;


         $id =  $request['tipo_documento'];
         $number=DB::table('document_type')->where('id', $id)->value('numeration');
         $request['number'] = $number;


         $cliente =  $request['cliente'];
         $empresa=DB::table('Provider')->where('id', $cliente)->value('name');


         $id =  $request['tipo_documento'];


         $code=DB::table('document_type')->where('id', $id)->value('name');

         //SalesInvoice::create($request->all());
         $id_cliente = null;
         if( $request['cliente'] != 0)
             $id_cliente = $request['cliente'];
         $purchasesinvoice = new PurchasesInvoice;
      //   $salesinvoice                      = new SalesInvoice;
         $purchasesinvoice->date_invoice        = $request['fecha_creacion'];
         $purchasesinvoice->number          = $request['numeracion'];
         $purchasesinvoice->date_due            = $request['fecha_vencimiento'];
         $purchasesinvoice->amount_total_signed = $request['total_docume
         to_venta'];
         $purchasesinvoice->subtotal            = $request['sub_total'];

         $purchasesinvoice->igv                 = $request['igv'];
         $purchasesinvoice->provider_id          = $id_cliente;
         $purchasesinvoice->user_id             = $request['user'];
         $purchasesinvoice->document_id         = $request['tipo_documento'];
         $purchasesinvoice->state_id            = 1;
         $purchasesinvoice->id_salesorder       = $request['salesorder'];
         $purchasesinvoice->description         = $request['descripcion'];
         $purchasesinvoice->discount           = $request['descuento_manual'];
         $purchasesinvoice->save();

         foreach($request['product'] as $key=> $value){
             $purchasesinvoicedetail             = new Detailpurchase;
             $purchasesinvoicedetail->amount     = $request['cantidad'][$key];
             $purchasesinvoicedetail->discounts  = $request['descuento'][$key];
             $purchasesinvoicedetail->unitprice  = $request['precio_unitario'][$key];
             $purchasesinvoicedetail->total      = $request['total'][$key];
             $purchasesinvoicedetail->invoice_id = $purchasesinvoice->id;
             $purchasesinvoicedetail->product_id = $request['product'][$key];
             $purchasesinvoicedetail->code = $cuenta;
             $purchasesinvoicedetail->save();
         }



         if ( $id == 4 || $id == 5 ){

             $regis= new AccountantSeat;
             $regis->date=$request['fecha_creacion'];
             $regis->code=$code;
             $regis->number=$request['number'];
             $regis->company=$empresa;
             $regis->reference=$request['reference'];
             $regis->diario_id=2; //journal -> diario de compras
             $regis->amount=$request['total_documento_venta'];
             $regis->state="Publicado";
             $regis->save();

             /*DB::table('accountantseat')->insert(
             ['date' =>  $regis->date, 'code' => $regis->code,'number' =>  $regis->number, 'company' =>  $regis->company,'reference' => $regis->reference, 'diario_id' =>  $regis->diario_id,'amount' => $regis->amount, 'state' => $regis->state]);
              */


             // Asientos para el subtotal

                 $accountseatdetail = new Accountseatdetail;
                 $accountseatdetail->accountseat_id  = $regis->id;
                 $accountseatdetail->account_id     = $cuentatotal;
                 $accountseatdetail->empresa_id =  $cliente;

                 $accountseatdetail->etiqueta =  "/";
                 $accountseatdetail->debe = 0;
                 $accountseatdetail->haber =  $purchasesinvoice->amount_total_signed ;
                 $accountseatdetail->save();




             //Asientos para el IGV

                 $accountseatdetail = new Accountseatdetail;
                 $accountseatdetail->accountseat_id  = $regis->id;
                 $accountseatdetail->account_id     = $cuentaigv;
                 $accountseatdetail->empresa_id =  $cliente;

                 $accountseatdetail->etiqueta =  "IGV 18% Compra";
                 $accountseatdetail->debe =  $purchasesinvoice->igv;
                 $accountseatdetail->haber =  0 ;
                 $accountseatdetail->save();


             /////////////////////////////////////////////

             $PurchasesInvoiceAux = PurchasesInvoice::find($purchasesinvoice->id);

             foreach ($PurchasesInvoiceAux->detailpurchase as $detailpurchase) {

                 $accountseatdetail = new Accountseatdetail;
                 $accountseatdetail->accountseat_id  = $regis->id;
                 $accountseatdetail->account_id     = $detailpurchase->code;
                 $accountseatdetail->empresa_id =  $cliente;
                 error_log($request['tipo_documento']);
                 $accountseatdetail->etiqueta =  $regis->code."/".$regis->number;
                 $accountseatdetail->debe =   $detailpurchase->total ;
                 $accountseatdetail->haber =  0 ;
                 $accountseatdetail->save();
             }
         }

         $number = $number + 1;
         DB::table('document_type')
             ->where('id', $id)
             ->update(['numeration' => $number]);

         return redirect()->route('PurchaseInvoice.index')->with('success', 'El documento de compra se ha registrado exitosamente');

       }
       elseif ($id == 5) {


         $code=DB::table('document_type')->where('id', $id)->value('name');
         $cliente = $request['client'];
         $cuenta = 1223; //se redirecciona a esta cuenta en la tabla
         $cuentaigv = 890;
         $cuentatotal = 965;//116
         $variable;
         $purchasesinvoice = new PurchaseInvoice;

              $auxsubtotal= DB::table('PurchaseInvoice')->where('id', $request['reference'])->value('subtotal');
               //Se cambia el estado de ese recibo
              DB::table('PurchaseInvoice')
              ->where('id', $request['reference'])
              ->update([
                          'state_id' => 3
                       ]);
               // fin del cambio de estado

              $auxigv= DB::table('PurchaseInvoice')->where('id', $request['reference'])->value('igv');
              $auxdiscount= DB::table('PurchaseInvoice')->where('id', $request['reference'])->value('discount');

              $purchasesinvoice->date_invoice        = $request['date_invoice'];
              $purchasesinvoice->number          = $request['number'];
              $purchasesinvoice->date_due            = $request['date_due'];
              $purchasesinvoice->amount_total_signed = $request['amount_total_signed'];
              $purchasesinvoice->residual_signed     = $request['residual_signed'];
              $purchasesinvoice->subtotal            = $auxsubtotal;
              $variable =  $auxsubtotal;
              $purchasesinvoice->igv                 = $auxigv;

               $id_cliente = $request['client'];
               $empresa=DB::table('customers')->where('id', $request['client'])->value('razon_social');
               $purchasesinvoice->partner_id          = $id_cliente;
               $purchasesinvoice->user_id             = $request['user_id'];
               $purchasesinvoice->document_id         = $request['document_id'];
               $purchasesinvoice->reference =        $request['reference'] ;
               $purchasesinvoice->state_id            = 1;
             // $salesinvoice->id_salesorder       = $aux->id_salesorder;
               $purchasesinvoice->description         = $request['description'];

               $purchasesinvoice->discount           = $auxdiscount;
               $purchasesinvoice->save();
               $number = $number + 1;
         DB::table('document_type')
             ->where('id', $id)
             ->update(['numeration' => $number]);


             $regis= new AccountantSeat;
             $regis->date=$request['date_invoice'];
             $regis->code=$code;
             $regis->number=$request['number'];
             $regis->company=$empresa;
             $regis->reference=$request['reference'];
             $regis->diario_id=2;
             $regis->amount=$request['amount_total_signed'];
             $regis->state="Publicado";
             $regis->save();

             /*DB::table('accountantseat')->insert(
             ['date' =>  $regis->date, 'code' => $regis->code,'number' =>  $regis->number, 'company' =>  $regis->company,'reference' => $regis->reference, 'diario_id' =>  $regis->diario_id,'amount' => $regis->amount, 'state' => $regis->state]);
              */


             // Asientos para el subtotal

                 $accountseatdetail = new Accountseatdetail;
                 $accountseatdetail->accountseat_id  = $regis->id;
                 $accountseatdetail->account_id     = $cuentatotal;
                 $accountseatdetail->empresa_id =  $cliente;

                 $accountseatdetail->etiqueta =  "/";
                 $accountseatdetail->debe =  $purchasesinvoice->amount_total_signed ;
                 $accountseatdetail->haber = 0;
                 $accountseatdetail->save();




             //Asientos para el IGV

                 $accountseatdetail = new Accountseatdetail;
                 $accountseatdetail->accountseat_id  = $regis->id;
                 $accountseatdetail->account_id     = $cuentaigv;
                 $accountseatdetail->empresa_id =  $cliente;

                 $accountseatdetail->etiqueta =  "IGV 18% Venta";
                 $accountseatdetail->debe =  0 ;
                 $accountseatdetail->haber = $purchasesinvoice->igv;
                 $accountseatdetail->save();


             /////////////////////////////////////////////

           ///  $SalesInvoiceAux = SalesInvoice::find($salesinvoice->id);



                 $accountseatdetail = new Accountseatdetail;
                 $accountseatdetail->accountseat_id  = $regis->id;
                 $accountseatdetail->account_id     = $cuenta;
                 $accountseatdetail->empresa_id =  $cliente;

                 $accountseatdetail->etiqueta =  $regis->code."/".$regis->number;
                 $accountseatdetail->debe = 0 ;
                 $accountseatdetail->haber =  $variable;
                 $accountseatdetail->save();





         return redirect()->route('PurchaseInvoice.index')->with('success', 'El documento de compra se ha registrado exitosamente');

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

         $purchasesinvoicedetails = DB::table('purchasesinvoicedetail')
                                 ->where('invoice_id', $id)
                                 ->get();
         $purchasesinvoice        = PurchaseInvoice::find($id);

         $data = [
             'purchasesinvoicedetails'     => $purchasesinvoicedetails,
             'purchasesinvoice'            => $purchasesinvoice,
         ];

         return view('sales.pages.salesdocument.show', $data);

     }

     /**
      * Show the form for editing the specified resource.
      *
      * @param  int  $id
      * @return \Illuminate\Http\Response
      */
     public function edit($id)
     {

  //////////Datos del pago si es que hubiera/////////

           $Partners = Customer::lists('name','id')->prepend('Seleccione al cliente');
           $metodo = Method_Payment::lists('name','id')->prepend('Metodo de Pago');
           $tipo = Type_Payment::where('id',1)->lists('name','id');



         /////////////////////
         $Partners = Provider::lists('name','id')->prepend('Seleccioname la cliente');
         $users = User::lists('name','id')->prepend('Seleccioname el usuario');
         $Document_type = Document_type::whereNotIn('id', [4, 5,6])->pluck('name','id')->prepend('Seleccioname el tipo de documento');
         $PurchaseInvoices = PurchaseInvoice::FindOrFail($id);
         $state = Stateinvoice::lists('name','id')->prepend('Seleccionar estado');
         /*
         $details = DetailSales::
                     select('salesinvoicedetail.id','salesinvoicedetail.invoice_id','product.name as product','accounts.code as name','salesinvoicedetail.amount','salesinvoicedetail.unitprice','salesinvoicedetail.discounts','salesinvoicedetail.total')
                     ->where('invoice_id','=',  $id)
                    ->join('accounts','accounts.id','=','salesinvoicedetail.code')
                    ->join('product','product.id','=','salesinvoicedetail.product_id')
                     ->paginate(5);
         */
         $details = Detailpurchase::where('invoice_id', $id)->paginate(10);

        // return view('/account/SalesInvoice/edit');
         return view('/account/PurchaseInvoice/edit', array('PurchaseInvoice'=>$PurchaseInvoices,'users'=>$users, 'Partners'=>$Partners , 'Document_type'=>$Document_type ,'state'=>$state,'details'=>$details ,'tipo'=>$tipo, 'metodo'=>$metodo, 'Partners'=>$Partners ));

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

         $PurchaseInvoice = PurchasesInvoice::FindOrFail($id);
         $input = $request->all();
         $PurchaseInvoices->fill($input)->save();
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

          $PurchaseInvoices = PurchaseInvoice::FindOrFail($id);
          $PurchaseInvoices->delete();
          return redirect()->route('FacturasProveedores.index');

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
         $salesinvoices = SalesInvoice::whereIn('document_id', [1, 2, 3])->orderBy('id', 'desc')->paginate(10);

         return  view('sales.pages.salesdocument.index')->with('SalesInvoice',$salesinvoices);
     }

 }
