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
Route::resource('FacturasClientes','Account\Sales\SalesController');
Route::resource('FacturasProveedores','Account\Purchases\PurchasesController');
Route::resource('Impuestos','Account\Taxes\TaxesController');
Route::resource('Bancos','Account\Bank\BankController');
Route::resource('PlanContable','Account\Accountplaning\AccountplaningController');
Route::resource('Documentos','Account\DocumentType\DocumentTypeController');

