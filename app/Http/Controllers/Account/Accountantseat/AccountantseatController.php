<?php

namespace App\Http\Controllers\Account\Accountantseat;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Journal;
use App\Models\Account\AccountantSeat;
use App\Models\Account\Accountseatdetail;
use Log;
use DB;
class AccountantseatController extends Controller
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
      	$accountantseats = AccountantSeat::
                    select('accountantseat.id','accountantseat.date','accountantseat.code','accountantseat.number','accountantseat.company','accountantseat.reference','journal.name as diario','accountantseat.amount','accountantseat.state')
                    ->join('journal','journal.id','=','accountantseat.diario_id')
                    ->orderBy('id', 'desc')
                    ->paginate(15);

        return view('/account/Accountantseat/index')->with('accountantseats',$accountantseats);
    }

      public function show($id)
    {
        $accountantseats = AccountantSeat::FindOrFail($id);
        $diario=  Journal::FindOrFail($accountantseats->diario_id)->value('name');
  
        error_log($accountantseats->id);
        

       // $details = Accountseatdetail::where('accountseat_id',$accountantseats->id);
$details = Accountseatdetail::where('accountseat_id', $accountantseats->id)->paginate(10);
// $details = DB::table('accountseatdetail')->where('accountseat_id',$accountantseats->id)->get();

         return view('/account/Accountantseat/show', array('accountantseats'=>$accountantseats,'diario'=>$diario,'details' => $details));
    }


}
