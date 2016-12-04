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

Route::group(['middleware' => 'auth'], function () {

	Route::group(['prefix' => 'logistica'], function () {
		
		Route::get('/', [
			'as' 	=> 'logistic.home',
			'uses' 	=> 'Logistic\LogisticHomeController@index'
			]);
		
		Route::group(['prefix' => 'categoria-producto'], function () {
			Route::get('/', [ 
				'as' 	=> 'logistic.product_category.index', 
				'uses' 	=> 'Logistic\ProductCategoryController@index' 
				]);
			Route::get('/crear', [ 
				'as' 	=> 'logistic.product_category.create', 
				'uses' 	=> 'Logistic\ProductCategoryController@create' 
				]);	
			Route::post('/', [ 
				'as' 	=> 'logistic.product_category.store', 
				'uses' 	=> 'Logistic\ProductCategoryController@store' 
				]);
			Route::get('/editar/{id}', [ 
				'as' 	=> 'logistic.product_category.edit', 
				'uses' 	=> 'Logistic\ProductCategoryController@edit' 
				]);
			Route::post('/update/{id}', [ 
				'as' 	=> 'logistic.product_category.update', 
				'uses' 	=> 'Logistic\ProductCategoryController@update' 
				]);	
		});

		Route::group(['prefix' => 'almacen'], function () {
			Route::get('/', [
				'as'	=> 'logistic.warehouse.index',
				'uses'	=> 'Logistic\WarehouseController@index'
				]);
			Route::get('/crear', [ 
				'as' 	=> 'logistic.warehouse.create', 
				'uses' 	=> 'Logistic\WarehouseController@create' 
				]);	
			Route::post('/', [ 
				'as' 	=> 'logistic.warehouse.store', 
				'uses' 	=> 'Logistic\WarehouseController@store' 
				]);
			Route::get('/editar/{id}', [ 
				'as' 	=> 'logistic.warehouse.edit', 
				'uses' 	=> 'Logistic\WarehouseController@edit' 
				]);
			Route::post('/update/{id}', [ 
				'as' 	=> 'logistic.warehouse.update', 
				'uses' 	=> 'Logistic\WarehouseController@update' 
				]);	
		});

		Route::group(['prefix' => 'seccion'], function () {
			Route::get('/', [
				'as'	=> 'logistic.section.index',
				'uses'	=> 'Logistic\SectionController@index'
				]);
			Route::get('/crear', [ 
				'as' 	=> 'logistic.section.create', 
				'uses' 	=> 'Logistic\SectionController@create' 
				]);	
			Route::post('/', [ 
				'as' 	=> 'logistic.section.store', 
				'uses' 	=> 'Logistic\SectionController@store' 
				]);
			Route::get('/editar/{id}', [ 
				'as' 	=> 'logistic.section.edit', 
				'uses' 	=> 'Logistic\SectionController@edit' 
				]);
			Route::post('/update/{id}', [ 
				'as' 	=> 'logistic.section.update', 
				'uses' 	=> 'Logistic\SectionController@update' 
				]);	
		});
	});
});
