<?php

namespace App\Http\Controllers\Account\Payment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Payment;
use DB;
use App\Models\Account\Partner;
use App\Models\Account\Method_Payment;
use App\Models\Account\AccountantSeat;
use App\Models\Account\Accountseatdetail;
use App\Models\Account\Type_Payment;

class PaymentController extends Controller
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
      	$payments = Payment::
                select('payment.id','payment.date','payment.number','payment.method','payment.type','payment.client','payment.amount','payment.reference','payment.state')
                 ->orderBy('id', 'desc')
                    ->paginate(5);

        return view('/account/Payment/index')->with('payments',$payments);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {

          $tipo = array( "Enviar"=>"Enviar Dinero", "Recibir"=>"Recibir Dinero");
          $Partners = Partner::lists('name','id')->prepend('Seleccione al cliente');
          $metodo = Method_Payment::lists('name','id')->prepend('Metodo de Pago');
          $tipo = Type_Payment::lists('name','id')->prepend('Tipo de Pago');

          return view('/account/Payment/create',array('tipo'=>$tipo, 'metodo'=>$metodo, 'Partners'=>$Partners));

 	}

     public function findnumber(Request $request, $id)
    {

           if($request->ajax()){

               $number=DB::table('paymentmethod')->where('id', $id)->value('numeration');

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
         $id =  $request['method'];
         $number=DB::table('paymentmethod')->where('id', $id)->value('numeration');
         $request['number'] = $number;

         Payment::create($request->all());

         $number = $number + 1;

         DB::table('paymentmethod')
            ->where('id', $id)
            ->update(['numeration' => $number]);

        return redirect()->route('Pagos.index');

    }

     public function storeventas(Request $request, $idfactura)
    {
        ///Asignar cuentas

        $document_id=DB::table('salesinvoice')->where('id', $idfactura)->value('document_id');

         $cuentapagobanco = 59;
         $cuentapagoefectivo = 52;
        $cuentacobro = 116;


         $id =  $request['method'];

         $number=DB::table('paymentmethod')->where('id', $id)->value('numeration');
         $request['number'] = $number;

         Payment::create($request->all());

         $number = $number + 1;

         DB::table('paymentmethod')
            ->where('id', $id)
            ->update(['numeration' => $number]);

          $pago =  $request['amount'];
          $deuda = DB::table('salesinvoice')->where('id', $idfactura)->value('residual_signed');
          $deuda = $deuda - $pago;
          if ($deuda <= 0) {
            $deuda=0.0;
            DB::table('salesinvoice')
            ->where('id', $idfactura)
            ->update(['residual_signed' => 0.0 ,
                        'state_id' => 2,
                     ]);

            //guardar las cuentas contables
         }elseif($deuda > 0)
         {
            DB::table('salesinvoice')
            ->where('id', $idfactura)
            ->update(['residual_signed' => $deuda ,

                     ]);

         }


         $regis= new AccountantSeat;
         $regis->date=$request['date'];
         $regis->code=DB::table('paymentmethod')->where('id',$request['method'] )->value('name');
         $regis->number=$request['number'];
         $regis->company=DB::table('customers')->where('id',$request['client'] )->value('razon_social');
         $regis->reference=$request['reference'];
         $regis->diario_id=$request['method'] + 2;
         $regis->amount=$request['amount'];
         $regis->state="Publicado";
         $regis->save();

         // Asientos para el total
             $cuenta;
             if ($request['method'] ==1) $cuenta =$cuentapagoefectivo;
             else $cuenta = $cuentapagobanco;


         //Registrar el asiento contable
if (  $document_id ==1) {


                $accountseatdetail = new Accountseatdetail;
                $accountseatdetail->accountseat_id  = $regis->id;
                $accountseatdetail->account_id     = $cuenta;
                $accountseatdetail->empresa_id =  $request['client'];
                $type=DB::table('paymenttype')->where('id',$request['type'] )->value('name');
                $accountseatdetail->etiqueta =  $type."/".$request['number'];
                $accountseatdetail->debe = $regis->amount;
                $accountseatdetail->haber =  0;
                $accountseatdetail->save();




            //Asientos para el la contrapartida

                $accountseatdetail = new Accountseatdetail;
                $accountseatdetail->accountseat_id  = $regis->id;
                $accountseatdetail->account_id     = $cuentacobro;
                $accountseatdetail->empresa_id =  $request['client'];
                $type=DB::table('paymenttype')->where('id',$request['type'] )->value('name');
                $accountseatdetail->etiqueta =  $type."/".$request['number'];
                $accountseatdetail->debe = 0;
                $accountseatdetail->haber =  $regis->amount;
                $accountseatdetail->save();


      }
      elseif ( $document_id ==2) {


                    $accountseatdetail = new Accountseatdetail;
                    $accountseatdetail->accountseat_id  = $regis->id;
                    $accountseatdetail->account_id     = $cuenta;
                    $accountseatdetail->empresa_id =  $request['client'];
                    $type=DB::table('paymenttype')->where('id',$request['type'] )->value('name');
                    $accountseatdetail->etiqueta =  $type."/".$request['number'];
                    $accountseatdetail->debe = 0;
                    $accountseatdetail->haber =  $regis->amount;
                    $accountseatdetail->save();




                //Asientos para el la contrapartida

                    $accountseatdetail = new Accountseatdetail;
                    $accountseatdetail->accountseat_id  = $regis->id;
                    $accountseatdetail->account_id     = $cuentacobro;
                    $accountseatdetail->empresa_id =  $request['client'];
                    $type=DB::table('paymenttype')->where('id',$request['type'] )->value('name');
                    $accountseatdetail->etiqueta =  $type."/".$request['number'];
                    $accountseatdetail->debe = $regis->amount;
                    $accountseatdetail->haber =   0;
                    $accountseatdetail->save();


              }
        return redirect()->route('FacturasClientes.index');

    }
     public function storecompras(Request $request)
    {
         $id =  $request['method'];
         $number=DB::table('paymentmethod')->where('id', $id)->value('numeration');
         $request['number'] = $number;

         Payment::create($request->all());

         $number = $number + 1;

         DB::table('paymentmethod')
            ->where('id', $id)
            ->update(['numeration' => $number]);

        return redirect()->route('Pagos.index');

    }


    public function show()
    {

        return view('/account/Payment/show');
    }


}
