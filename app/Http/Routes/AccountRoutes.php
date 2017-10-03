<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::auth();

Route::get('/', function () {
    return view('welcome');
});

Route::get('ModuloContable', 'Account\AccountController@index');
Route::resource('Impuestos','Account\Taxes\TaxesController');
Route::resource('Bancos','Account\Bank\BankController');
Route::resource('PlanContable','Account\Accountplaning\AccountplaningController');
Route::resource('Tipo_de_documento','Account\DocumentType\DocumentTypeController');
Route::resource('Tipo_Diario','Account\Journals\JournalsController');
Route::resource('Pagos','Account\Payment\PaymentController');
Route::resource('AsientosContables','Account\Accountantseat\AccountantseatController');

Route::resource('FacturasClientes','Account\Sales\SalesController');
Route::get('FacturasClientes/encuentra/{id}','Account\Sales\SalesController@findnumber');
Route::get('FacturasClientes/encuentranc/{id}','Account\Sales\SalesController@findnumbernc');

Route::resource('FacturasProveedores','Account\Purchases\PurchasesController');
Route::get('FacturasProveedores/encuentra/{id}','Account\Purchases\PurchasesController@findnumber');
Route::get('FacturasProveedores/encuentrand/{id}','Account\Purchases\PurchasesController@findnumbernd');



Route::get('Pagos/encuentra/{id}','Account\Payment\PaymentController@findnumber');
Route::get('PlanContable/encuentra/{id}','Account\Accountplaning\AccountplaningController@findnumber');
Route::post('/Pagos/storeventas/{idfactura}','Account\Payment\PaymentController@storeventas');
Route::get('Informes/Diario','Account\Report\ReportController@diario');
Route::post('/Informes/exportdiario','Account\Report\ReportController@diarioexport');
Route::get('Informes/Mayor','Account\Report\ReportController@mayor');
Route::post('/Informes/exportmayor','Account\Report\ReportController@mayorexport');
