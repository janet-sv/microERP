<?php

namespace App\Http\Controllers\Account\Journals;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Journal;

class JournalsController extends Controller
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
      	$journals = Journal::
                select('journal.id','journal.name','journal.description')
                    ->paginate(5);

        return view('/account/Journal/index')->with('journals',$journals);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
        return view('/account/Journal/create');
 	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Journal::create($request->all());
        return redirect()->route('Tipo_Diario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $journal = Journal::FindOrFail($id);
        return view('/account/Journal/show', array('journal'=>$journal));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $journal = Journal::FindOrFail($id);
        return view('/account/Journal/edit', array('journal'=>$journal));

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
        
        $journal = Journal::FindOrFail($id);
        $input = $request->all();
        $journal->fill($input)->save();
        return redirect()->route('Tipo_Diario.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
   public function destroy($id)
    {
        
        $journal = Journal::FindOrFail($id);
        $journal->delete();
        return redirect()->route('Tipo_Diario.index');
                
    }
}
