<?php

namespace App\Http\Controllers\Sales;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;

class SalesController extends Controller
{
    
    public function index()
    {
        return view('sales.pages.home.home');
    }
}
