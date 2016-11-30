<?php

namespace App\Http\Controllers\Account\Payment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Payment;
use DB;
use App\Models\Account\Partner;

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
          $metodo = array( "Banco"=>"BANCO (PEN)", "Efectivo"=>"EFECTIVO (PEN)");
          $Partners = Partner::lists('name','id')->prepend('Seleccione al cliente');
        return view('/account/Payment/create',array('tipo'=>$tipo, 'metodo'=>$metodo, 'Partners'=>$Partners));
 	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Payment::create($request->all());
        return redirect()->route('Pagos.index');
    }

   

    
}
