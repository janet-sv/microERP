<?php

namespace App\Http\Controllers\Logistic;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogisticHomeController extends Controller
{
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    public function index()
    {
        return view('logistic.pages.home.home');
    }
}
