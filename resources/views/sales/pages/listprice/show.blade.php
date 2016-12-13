@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">	
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Precio de lista</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Datos del precio de lista
                    </div>
                    <div class="panel-body">
                        <form role="form">                        	                        	
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Categoría de producto</label>
                                        <select class="form-control">                                           
                                            <option value="0">Seleccione</option>                                            
                                        </select>
                                    </div>
                                </div>                                   
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Producto</label>
                                        <select class="form-control">                                           
                                            <option value="0">Seleccione</option>                                                                                        
                                        </select>
                                    </div>
                                </div>                                                               
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Precio de venta</label>
                                        <input class="form-control" name="price" placeholder="Precio" maxlength="7">
                                    </div>                               
                                </div>                                                           
                            </div>                                                        
                            <div class="col-lg-12">                                    
                                <button class="btn btn-success pull-right" type="submit">Guardar</button>                                    
                                <a href="#" class="btn btn-default pull-right">Cancelar</a>                                      
                            </div>
                        </form>
                    </div>                              
				</div>
			</div>                              
		</div>	
</section>

@endsection