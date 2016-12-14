<?php

namespace App\Http\Controllers\Account;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AccountController extends Controller
{
    //
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
        $Fventas=DB::table('salesinvoice')->count();
        $Fventasabiertas=DB::table('salesinvoice')->where('state_id',1)->count();
        $Fventascerrado=DB::table('salesinvoice')->where('state_id', 2)->count();

        $Fcompras=DB::table('purchasesinvoice')->count();
        $Fcomprasabiertas=DB::table('purchasesinvoice')->where('state_id',1)->count();
        $Fcomprascerrado=DB::table('purchasesinvoice')->where('state_id', 2)->count();

        $Pventa=DB::table('payment')->where('type',1)->count();
        $Pventabanco=DB::table('payment')->where([
                                                   ['type', '=', 1],
                                                   ['method', '=', 2]
                                                 ])->count();
         $Pventaefectivo=DB::table('payment')->where([
                                                   ['type', '=', 1],
                                                   ['method', '=', 1]
                                                 ])->count();

        $Pcompra=DB::table('payment')->where('type',2)->count();
        $Pcomprabanco=DB::table('payment')->where([
                                                   ['type', '=', 2],
                                                   ['method', '=', 2]
                                                 ])->count();
        $Pcompraefectivo=DB::table('payment')->where([
                                                   ['type', '=', 2],
                                                   ['method', '=', 2]
                                                 ])->count();    

        return view('/account/home',array('Fventas'=>$Fventas, 'Fventasabiertas'=>$Fventasabiertas, 'Fventascerrado'=>$Fventascerrado,'Fcompras'=>$Fcompras, 'Fcomprasabiertas'=>$Fcomprasabiertas, 'Fcomprascerrado'=>$Fcomprascerrado,'Pventa'=>$Pventa, 'Pventabanco'=>$Pventabanco, 'Pventaefectivo'=>$Pventaefectivo,'Pcompra'=>$Pcompra, 'Pcomprabanco'=>$Pcomprabanco, 'Pcompraefectivo'=>$Pcompraefectivo));
    }
}
