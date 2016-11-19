@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">	
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Nuevo cliente</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos del cliente
                    </div>
                    <div class="panel-body">
                        {{Form::open(['route' => 'customer.store', 'id'=>'formSuggestion'])}}
                        	<div class="row">
                        		<div class="col-lg-6">
	                        		<div class="form-group">
	                                    <label>Tipo de contribuyente</label>
	                                    <select class="form-control" name="tipo_contribuyente">	                                    	
	                                        <option value="1">Natural</option>
	                                        <option value="2">Jurídico</option>
	                                    </select>
	                                </div>
                                </div>	                                 
                        	</div>
                        	<div class="row">
                            	<div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" name="nombre" placeholder="Nombre" maxlength="50">
                                    </div>
                            	</div>                               		
                            	<div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Apellido paterno</label>
                                        <input class="form-control" name="apellido_paterno" placeholder="Apellido parterno" maxlength="50">
                                    </div>
                                </div> 
                        	</div>        
                            <div class="row">
                            	<div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Apellido materno</label>
                                        <input class="form-control" name="apellido_materno" placeholder="Apellido materno" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-lg-6">                                    
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select class="form-control" name="sexo">                                           
                                            <option>Seleccione</option>
                                            <option value="1">Masculino</option>
                                            <option value="2">Femenino</option>
                                        </select>                              
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">                                    
                                    <div class="form-group">
                                        <label>Tipo documento</label>
                                        <select class="form-control" name="tipo_documento">	 
                                            <option>Seleccione</option>                                   	
	                                        <option value="1">DNI</option>
	                                        <option value="2">PASAPORTE</option>
	                                        <option value="3">C.E.</option>
	                                        <option value="4">OTRO</option>
	                                    </select>                             
                                    </div>
                                </div>
                            	<div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Número de documento</label>
                                        <input class="form-control" name="numero_documento" placeholder="Número de documento" maxlength="15">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Ruc</label>
                                        <input class="form-control" name="ruc" placeholder="Ruc" maxlength="11">
                                    </div>
                                </div>
                                <div class="col-lg-6">                                    
                                    <div class="form-group">
                                        <label>Razón social</label>
                                        <input class="form-control" name="razon_social" placeholder="Razón social" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">  
                                    <div class="form-group">                                  
                                        <label>Direccion</label>
                                        <textarea style="resize:none;" name="direccion" class="form-control none-resisable" rows="3" placeholder="Direccion" ></textarea>    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-lg-6">
                                	<label>Porcentaje de descuento</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="text" class="form-control" name="porcentaje_descuento" placeholder="Porcentaje de descuento" maxlength="3">
                                    </div>
                                </div>
                                <div class="col-lg-6">                                    
                                    <label>Plazo de crédito</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">días</span>
                                        <input class="form-control" name="plazo_credito" placeholder="Plazo de crédito" maxlength="3">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Línea de crédito</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="text" class="form-control" name="linea_credito" placeholder="Línea de créedito" maxlength="10">
                                    </div>
                                </div>                                
                            </div>
                            <!--
                            <div class="row">                                
                                <div class="col-lg-6">                                    
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control">                                           
                                            <option value="1">Activo</option>
                                            <option value="0">Inactivo</option>
                                        </select>                              
                                    </div>
                                </div>
                            </div>
                            -->
                            <div class="row">
                                <div class="col-lg-12">                                    
                                    {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}                                                                       
                                    <a class="btn btn-default pull-right" href="{{ route('promotionbyproduct.index') }}">Cancelar</a>                                    
                                </div>
                            </div>
                        {{Form::close()}}
                    </div>                              
				</div>
			</div>                              
		</div>	
</section>

@endsection