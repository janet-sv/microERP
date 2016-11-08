@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">	
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Promoción por producto</h1>
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
                            	 <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Condición de promoción</label>
                                        <select class="form-control">                                           
                                            <option value="0">Seleccione</option>                                            
                                        </select>
                                    </div>
                                </div> 
                        	</div>        
                            <div class="row">
                            	<div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Fecha de inicio</label>
                                        <div class='input-group date' id='datetimepickerBeginByProduct'>
                                            <input type='text' class="form-control" placeholder="dd/mm/aaaa"/>
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
                                        <label>Categoría de producto</label>
                                        <select class="form-control">                                           
                                            <option value="0">Seleccione</option>                                            
                                        </select>
                                    </div>
                                </div>                                   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Producto</label>
                                        <select class="form-control">                                           
                                            <option value="0">Seleccione</option>                                                                                        
                                        </select>
                                    </div>
                                </div>                                                               
                            </div>                            
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6">                                    
                                        <label>Descripción</label>
                                        <textarea style="resize:none;"class="form-control none-resisable" rows="3" placeholder="Descripción" ></textarea>    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">                                    
                                    <button class="btn btn-success pull-right" type="submit">Guardar</button>                                    
                                    <a href="#" class="btn btn-default pull-right">Cancelar</a>                                      
                                </div>
                            </div>
                        </form>
                    </div>                              
				</div>
			</div>                              
		</div>	
</section>

@endsection