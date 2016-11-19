@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Promoción por agrupación de productos</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos de la promoción
                    </div>
                    <div class="panel-body">
                        <form role="form">                          
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" name="name" placeholder="Nombre" maxlength="50">
                                    </div>
                                </div>                                                                       
                            </div>        
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Fecha de inicio</label>
                                        <div class='input-group date' id='datetimepickerBeginByProduct'>
                                            <input type='text' class="form-control" placeholder="dd/mm/aaaa" />
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Fecha de fin</label>
                                        <div class='input-group date' id='datetimepickerEndByProduct'>
                                            <input type='text' class="form-control" placeholder="dd/mm/aaaa"/>
                                            <span class="input-group-addon">
                                                <span class="glyphicon glyphicon-calendar"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <div class="form-group">                                   
                                        <label>Descripción</label>
                                        <textarea style="resize:none;"class="form-control none-resisable" rows="3" placeholder="Descripción" ></textarea>    
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <label>Detalle de promoción</label>                                                                          
                                    <div class="form-group"> 
                                        <a id="add" class="btn btn-warning">Agregar</a>
                                        <a id="remove" class="btn btn-danger">Quitar</a>
                                    </div>                                    
                                </div>    
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detalle
                                </div>  
                                <div class="panel-body">                                                                                   
                                    <div id="promotion">
                                        <div class="row">                                                            
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Categoría de producto</label>
                                                    <select class="form-control" name="categoryproduct1">                                           
                                                        <option value="0">Seleccione</option>                                            
                                                    </select>
                                                </div>
                                            </div>                                   
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Producto</label>
                                                    <select class="form-control" name="product1">                                           
                                                        <option value="0">Seleccione</option>                                                                                        
                                                    </select>
                                                </div>
                                            </div>                                                               
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Cantidad de descuento</label>
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">u</span>
                                                        <input class="form-control" name="cantidad_descuento1" placeholder="Cantidad de descuento" maxlength="3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Porcentaje de descuento</label>
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">%</span>
                                                        <input type="text" class="form-control" name="porcentaje_descuento1" placeholder="Porcentaje de descuento">
                                                    </div>
                                                </div>
                                            </div>                                
                                        </div> 
                                        <div class="row">                                                            
                                            <div class="col-lg-3">
                                                <div class="form-group">                                                    
                                                    <select class="form-control" name="categoryproduct2">                                           
                                                        <option value="0">Seleccione</option>                                            
                                                    </select>
                                                </div>
                                            </div>                                   
                                            <div class="col-lg-3">
                                                <div class="form-group">                                                    
                                                    <select class="form-control" name="product2">                                           
                                                        <option value="0">Seleccione</option>                                                                                        
                                                    </select>
                                                </div>
                                            </div>                                                               
                                            <div class="col-lg-3">
                                                <div class="form-group">                                                    
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">u</span>
                                                        <input class="form-control" name="cantidad_descuento2" placeholder="Cantidad de descuento" maxlength="3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">                                                    
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">%</span>
                                                        <input type="text" class="form-control" name="porcentaje_descuento2" placeholder="Porcentaje de descuento">
                                                    </div>
                                                </div>
                                            </div>                                
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">                                    
                                    <button class="btn btn-success pull-right" type="submit">Guardar</button>                                    
                                    <a href="{{route('promotionbygroup.index')}}" class="btn btn-default pull-right">Cancelar</a>                                      
                                </div>
                            </div>
                        </form>
                    </div>                              
                </div>
            </div>                              
        </div>  
</section>

<script src="{{ URL::asset('build/js/sales/promotion.js')}}"></script>

@endsection