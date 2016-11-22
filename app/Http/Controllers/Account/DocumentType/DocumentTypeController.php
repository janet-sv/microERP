<?php

namespace App\Http\Controllers\Account\DocumentType;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Document_type;

class DocumentTypeController extends Controller
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
      	$document_type = Document_type::
                select('document_type.id','document_type.name','document_type.description','document_type.numeration')
                    ->paginate(5);

        return view('/account/Document_type/index')->with('document_type',$document_type);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
        return view('/account/Bank/cerate' , array('banco'=>$banco));
 	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bank::create($request->all());
        return redirect()->route('Bancos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $banks = Bank::FindOrFail($id);
        return view('/account/Bank/show', array('banks'=>$banks));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $banco = array( "Banco de Comercio"=>"Banco de Comercio", "Banco de Crédito del Perú"=>"Banco de Crédito del Perú", "Banco Interamericano de Finanzas (BanBif)"=>"Banco Interamericano de Finanzas (BanBif)", "Banco Financiero"=>"Banco Financiero", "BBVA Continental"=>"BBVA Continental", "Citibank"=>"Citibank", "Interbank"=>"Interbank", "MiBanco"=>"MiBanco", "Scotiabank Perú"=>"Scotiabank Perú", "Banco GNB Perú"=>"Banco GNB Perú" );
        $banks = Bank::FindOrFail($id);
        return view('/account/Bank/edit', array('banks'=>$banks, 'banco'=>$banco));

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
        
        $banks = Bank::FindOrFail($id);
        $input = $request->all();
        $banks->fill($input)->save();
        return redirect()->route('Bancos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
   public function destroy($id)
    {
        
        $banks = Bank::FindOrFail($id);
        $banks->delete();
        return redirect()->route('Bancos.index');
                
    }
    
}
