<?php

namespace App\Http\Controllers\Account\Payment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Payment;
use DB;
use App\Models\Account\Partner;
use App\Models\Account\Method_Payment;

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

   

    
}
