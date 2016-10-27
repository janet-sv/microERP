<?php

namespace App\Http\Controllers\Account\Sales;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Account\Partner;
use App\Models\Account\SalesInvoice;
use App\User;


class SalesController extends Controller
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
      $salesinvoices = SalesInvoice::
                    select('salesinvoice.id','partner.name as client','salesinvoice.date_invoice','salesinvoice.number','users.name as user','salesinvoice.date_due','salesinvoice.amount_total_signed','salesinvoice.residual_signed','salesinvoice.state')
                    ->join('partner','partner.id','=','salesinvoice.partner_id')
                    ->join('users','users.id','=','salesinvoice.user_id')
                    ->paginate(5);
        return view('/account/SalesInvoice/index')->with('SalesInvoice',$salesinvoices);
    }
   
}
