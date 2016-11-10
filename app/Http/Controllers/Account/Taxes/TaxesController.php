<?php

namespace App\Http\Controllers\Account\Taxes;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Taxes;
use DB; 

class TaxesController extends Controller
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
      	$taxes = Taxes::
                    select('taxes.id','taxes.name','taxes.scope_tax','taxes.tax_calculation','taxes.amount')
                    ->paginate(5);

        return view('/account/Taxes/index')->with('taxes',$taxes);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $ambito = array( "Ventas"=>"Ventas", "Ventas"=>"Compras");
        $calculo = array("Porcentaje"=>"Porcentaje sobre el precio en %", "Fijo"=>"Fijo");
        return view('/account/Taxes/create' , array('ambito'=>$ambito ,'calculo'=>$calculo ));
 	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Taxes::create($request->all());
        return redirect()->route('Impuestos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $taxes = Taxes::FindOrFail($id);
        return view('/account/Taxes/show', array('taxes'=>$taxes));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $taxes = Taxes::FindOrFail($id);
        return view('/account/Taxes/edit', array('taxes'=>$taxes));

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
        
        $taxes = Taxes::FindOrFail($id);
        $input = $request->all();
        $taxes->fill($input)->save();
        return redirect()->route('Impuestos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        
         $taxes = Taxes::FindOrFail($id);
        $taxes->delete();
        return redirect()->route('Impuestos.index');
                
    }


}
