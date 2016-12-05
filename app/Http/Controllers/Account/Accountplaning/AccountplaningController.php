<?php

namespace App\Http\Controllers\Account\Accountplaning;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Accounts;
use DB;
use App\Models\Account\Bank;

class AccountplaningController extends Controller
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
      	$accounts = Accounts::
                    select('accounts.id','accounts.code','accounts.name','accounts.account_level','accounts.account_type','accounts.analysis_type','accounts.debit','accounts.credit')
                    ->orderBy('id')
                    ->paginate(20);

        return view('/account/Accountplaning/index')->with('accounts',$accounts);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
       $nivel = array( "B"=>"Balance", "S"=>"Sub-Cuenta", "R"=>"Registro");
       $cuenta = array( "A"=>"Activo", "P"=>"Pasivo","R"=>"Resultado", "N"=>"Naturaleza","F"=>"Funcion", "O"=>"Orden","M"=>"Mayor");
       $analisis = array( "S"=>"Sin Análisis", "P"=>"Por Documento", "C"=>"Cuenta de Banco", "D"=>"Solo Detalle");  
       // $bank = DB::select('select * from bank');  
       $bank = Bank::lists('name_bank','id')->prepend('Seleccione al Banco');
        return view('/account/Accountplaning/create',array('nivel'=>$nivel,'cuenta'=>$cuenta,'analisis'=>$analisis,'bank'=>$bank));
 	}

    public function findnumber(Request $request, $id)
    {

           if($request->ajax()){
               
               $number=DB::table('bank')->where('id', $id)->value('number');
            
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

        Accounts::create($request->all());
        return redirect()->route('PlanContable.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accounts = Accounts::FindOrFail($id);
        return view('/account/Accountplaning/show', array('accounts'=>$accounts));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    	$nivel = array( "B"=>"Balance", "S"=>"Sub-Cuenta", "R"=>"Registro");
       $cuenta = array( "A"=>"Activo", "P"=>"Pasivo","R"=>"Resultado", "N"=>"Naturaleza","F"=>"Funcion", "O"=>"Orden","M"=>"Mayor");
       $analisis = array( "S"=>"Sin Análisis", "P"=>"Por Documento", "C"=>"Cuenta de Banco", "D"=>"Solo Detalle");
         //$bank = DB::select('select * from bank');  
         $bank = Bank::lists('name_bank','id')->prepend('Seleccione al banco');
        
        $accounts = Accounts::FindOrFail($id);
        return view('/account/Accountplaning/edit', array('accounts'=>$accounts,'nivel'=>$nivel,'cuenta'=>$cuenta,'analisis'=>$analisis,'bank'=>$bank));

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
        
        $accounts = Accounts::FindOrFail($id);
        $input = $request->all();
        $accounts->fill($input)->save();
        return redirect()->route('PlanContable.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        
         $accounts = Accounts::FindOrFail($id);
         $accounts->delete();
        return redirect()->route('PlanContable.index');
                
    }

}
