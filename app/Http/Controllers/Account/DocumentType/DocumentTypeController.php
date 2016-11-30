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
      	$document_types = Document_type::
                select('document_type.id','document_type.name','document_type.description','document_type.numeration')
                    ->paginate(5);

        return view('/account/Document_type/index')->with('document_types',$document_types);
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
        return view('/account/Document_type/create');
 	}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Document_type::create($request->all());
        return redirect()->route('Tipo_de_documento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document_type = Document_type::FindOrFail($id);
        return view('/account/Document_type/show', array('document_type'=>$document_type));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $document_type = Document_type::FindOrFail($id);
        return view('/account/Document_type/edit', array('document_type'=>$document_type));

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
        
        $document_type = Document_type::FindOrFail($id);
        $input = $request->all();
        $document_type->fill($input)->save();
        return redirect()->route('Tipo_de_documento.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
   public function destroy($id)
    {
        
        $document_type = Document_type::FindOrFail($id);
        $document_type->delete();
        return redirect()->route('Tipo_de_documento.index');
                
    }
    
}
