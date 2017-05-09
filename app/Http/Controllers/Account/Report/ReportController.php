<?php

namespace App\Http\Controllers\Account\Report;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;

class ReportController extends Controller
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
    public function diario()
    {
      return  view('/account/Report/diario');
    }

public function mayor()
    {
      return  view('/account/Report/mayor');
    }

     public function diarioexport(Request $request)
    {
       
      Excel::create('ReporteDiario', function($excel) {

            // Set the title
            $excel->setTitle('Reporte de Diario - MicroERP');

            // Chain the setters
            $excel->setCreator('Alejandro')->setCompany('MicroERP');

            $excel->setDescription('Este es un reporte de Diario');

            $data = [12,"Hey",123,4234,5632435,"Nope",345,345,345,345];

            $excel->sheet('Diario', function ($sheet) use ($data) {
                $sheet->setOrientation('landscape');
                $sheet->fromArray($data, NULL, 'A3');
            });

        })->download('xlsx');
      
         return  view('/account/Report/diario');

    }


public function mayorexport(Request $request)
    {
       
      Excel::create('ReporteDiario', function($excel) {

            // Set the title
            $excel->setTitle('Reporte de Diario - MicroERP');

            // Chain the setters
            $excel->setCreator('Alejandro')->setCompany('MicroERP');

            $excel->setDescription('Este es un reporte de Diario');

            $data = [12,"Hey",123,4234,5632435,"Nope",345,345,345,345];

            $excel->sheet('Diario', function ($sheet) use ($data) {
                $sheet->setOrientation('landscape');
                $sheet->fromArray($data, NULL, 'A3');
            });

        })->download('xlsx');
      
         return  view('/account/Report/diario');

    }
}
