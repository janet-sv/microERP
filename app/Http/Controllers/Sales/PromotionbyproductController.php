<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Sales\Promocondition;
use App\Http\Requests\Sales\PromoconditionRequest;
use App\Http\Requests;

class PromotionbyproductController extends Controller
{
    //
    public function index()
    {
    	/*
        $promoconditions = Promocondition::orderBy('nombre', 'asc')->get();

        $data = [
            'promoconditions'    =>  $promoconditions,
        ];
		*/
        //return view('sales.pages.promocondition.index', $data);
        return view('sales.pages.promotion.byproduct.index');
    }
}
