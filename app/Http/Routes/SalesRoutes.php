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



Route::group(['prefix' => 'ventas'], function(){

			Route::get('/', 'Sales\SalesController@index');

            //Administrar condición de promociones

            Route::group(['prefix' => 'cliente'], function(){    
                Route::get('/', ['as' => 'customer.index', 'uses' => 'Sales\CustomerController@index']);
                Route::get('create', ['as' => 'customer.create', 'uses' => 'Sales\CustomerController@create']);
                Route::post('create', ['as' => 'customer.store', 'uses' => 'Sales\CustomerController@store']);
                //Route::get('show/{id}', ['as' => 'promocondition.show', 'uses' => 'Investigation\Promocondition\PromoconditionController@show']);
                Route::get('edit/{id}', ['as' => 'customer.edit', 'uses' => 'Sales\CustomerController@edit']);
                Route::post('edit/{id}', ['as' => 'customer.update', 'uses' => 'Sales\CustomerController@update']);
                Route::get('delete/{id}', ['as' => 'customer.delete', 'uses' => 'Sales\CustomerController@destroy']);
            });


			//Administrar condición de promociones

            Route::group(['prefix' => 'condicionpromocion'], function(){    
                Route::get('/', ['as' => 'promocondition.index', 'uses' => 'Sales\PromoconditionController@index']);
                Route::get('create', ['as' => 'promocondition.create', 'uses' => 'Sales\PromoconditionController@create']);
                Route::post('create', ['as' => 'promocondition.store', 'uses' => 'Sales\PromoconditionController@store']);
                //Route::get('show/{id}', ['as' => 'promocondition.show', 'uses' => 'Investigation\Promocondition\PromoconditionController@show']);
                Route::get('edit/{id}', ['as' => 'promocondition.edit', 'uses' => 'Sales\PromoconditionController@edit']);
                Route::post('edit/{id}', ['as' => 'promocondition.update', 'uses' => 'Sales\PromoconditionController@update']);
                Route::get('delete/{id}', ['as' => 'promocondition.delete', 'uses' => 'Sales\PromoconditionController@destroy']);
            });

            //Administrar condición de promociones

            Route::group(['prefix' => 'preciolista'], function(){    
                Route::get('/', ['as' => 'listprice.index', 'uses' => 'Sales\ListpriceController@index']);
                Route::get('create', ['as' => 'listprice.create', 'uses' => 'Sales\ListpriceController@create']);
                Route::post('create', ['as' => 'listprice.store', 'uses' => 'Sales\ListpriceController@store']);
                //Route::get('show/{id}', ['as' => 'listpricen.show', 'uses' => 'Investigation\Listprice\ListpriceController@show']);
                Route::get('edit/{id}', ['as' => 'listprice.edit', 'uses' => 'Sales\ListpriceController@edit']);
                Route::post('edit/{id}', ['as' => 'listprice.update', 'uses' => 'Sales\ListpriceController@update']);
                Route::get('delete/{id}', ['as' => 'listprice.delete', 'uses' => 'Sales\ListpriceController@destroy']);
                Route::get('/findProducts', ['as' => 'listprice.findProducts', 'uses' => 'Sales\ListpriceController@findProducts']);
                Route::get('/findProductsInEdit', ['as' => 'listprice.findProductsInEdit', 'uses' => 'Sales\ListpriceController@findProductsInEdit']);
            });

            //Administrar promociones por producto

            Route::group(['prefix' => 'promociones'], function(){    
                Route::group(['prefix' => 'por-producto'], function(){    
                    Route::get('/', ['as' => 'promotionbyproduct.index', 'uses' => 'Sales\PromotionbyproductController@index']);
                    Route::get('create', ['as' => 'promotionbyproduct.create', 'uses' => 'Sales\PromotionbyproductController@create']);
                    Route::post('create', ['as' => 'promotionbyproduct.store', 'uses' => 'Sales\PromotionbyproductController@store']);
                    //Route::get('show/{id}', ['as' => 'promocondition.show', 'uses' => 'Investigation\Promocondition\PromoconditionController@show']);
                    Route::get('edit/{id}', ['as' => 'promotionbyproduct.edit', 'uses' => 'Sales\PromotionbyproductController@edit']);
                    Route::post('edit/{id}', ['as' => 'promotionbyproduct.update', 'uses' => 'Sales\PromotionbyproductController@update']);
                    Route::get('delete/{id}', ['as' => 'promotionbyproduct.delete', 'uses' => 'Sales\PromotionbyproductController@destroy']);
                    Route::get('/findProducts', ['as' => 'promotionbyproduct.findProducts', 'uses' => 'Sales\PromotionbyproductController@findProducts']);
                    Route::get('/findProductsInEdit', ['as' => 'promotionbyproduct.findProductsInEdit', 'uses' => 'Sales\PromotionbyproductController@findProductsInEdit']);
                });
            });

            //Administrar promociones por agrupacion de productos

            Route::group(['prefix' => 'promociones'], function(){    
                Route::group(['prefix' => 'por-agrupacion-de-producto'], function(){    
                    Route::get('/', ['as' => 'promotionbygroup.index', 'uses' => 'Sales\PromotionbygroupController@index']);
                    Route::get('create', ['as' => 'promotionbygroup.create', 'uses' => 'Sales\PromotionbygroupController@create']);
                    Route::post('create', ['as' => 'promotionbygroup.store', 'uses' => 'Sales\PromotionbygroupController@store']);
                    //Route::get('show/{id}', ['as' => 'promocondition.show', 'uses' => 'Investigation\Promocondition\PromoconditionController@show']);
                    Route::get('edit/{id}', ['as' => 'promotionbygroup.edit', 'uses' => 'Sales\PromotionbygroupController@edit']);
                    Route::post('edit/{id}', ['as' => 'promotionbygroup.update', 'uses' => 'Sales\PromotionbygroupController@update']);
                    Route::get('delete/{id}', ['as' => 'promotionbygroup.delete', 'uses' => 'Sales\PromotionbygroupController@destroy']);
                    Route::get('/findProducts', ['as' => 'promotionbygroup.findProducts', 'uses' => 'Sales\PromotionbygroupController@findProducts']);
                    Route::get('/findProductsInEdit', ['as' => 'promotionbygroup.findProductsInEdit', 'uses' => 'Sales\PromotionbygroupController@findProductsInEdit']);
                });
            });
            

            //Administrar proformas

            Route::group(['prefix' => 'proformas'], function(){                    
                Route::get('/', ['as' => 'offer.index', 'uses' => 'Sales\OfferController@index']);
                Route::get('create', ['as' => 'offer.create', 'uses' => 'Sales\OfferController@create']);
                Route::post('create', ['as' => 'offer.store', 'uses' => 'Sales\OfferController@store']);
                //Route::get('show/{id}', ['as' => 'promocondition.show', 'uses' => 'Investigation\Promocondition\PromoconditionController@show']);
                Route::get('edit/{id}', ['as' => 'offer.edit', 'uses' => 'Sales\OfferController@edit']);
                Route::post('edit/{id}', ['as' => 'offer.update', 'uses' => 'Sales\OfferController@update']);
                Route::get('delete/{id}', ['as' => 'offer.delete', 'uses' => 'Sales\OfferController@destroy']);
                Route::get('/findProducts', ['as' => 'offer.findProducts', 'uses' => 'Sales\OfferController@findProducts']);
                Route::get('/findProductsInEdit', ['as' => 'offer.findProductsInEdit', 'uses' => 'Sales\OfferController@findProductsInEdit']);
                Route::get('/findPrice', ['as' => 'offer.findPrice', 'uses' => 'Sales\OfferController@findPrice']);
                
            });

});