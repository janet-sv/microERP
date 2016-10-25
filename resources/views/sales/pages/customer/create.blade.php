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
                        <form role="form">
                        	<div class="row">
                        		<div class="col-lg-6">
	                        		<div class="form-group">
	                                    <label>Tipo de contribuyente</label>
	                                    <select class="form-control">	                                    	
	                                        <option value="0">Natural</option>
	                                        <option value="1">Jurídico</option>
	                                    </select>
	                                </div>
                                </div>	                                 
                        	</div>
                        	<div class="row">
                            	<div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" name="name" placeholder="Nombre" maxlength="50">
                                    </div>
                            	</div>                               		
                            	<div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Apellido paterno</label>
                                        <input class="form-control" name="fatherLastName" placeholder="Apellido parterno" maxlength="50">
                                    </div>
                                </div> 
                        	</div>        
                            <div class="row">
                            	<div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Apellido materno</label>
                                        <input class="form-control" name="motherlastName" placeholder="Apellido materno" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-lg-6">                                    
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <select class="form-control">                                           
                                            <option value="0">Masculino</option>
                                            <option value="1">Femenino</option>
                                        </select>                              
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">                                    
                                    <div class="form-group">
                                        <label>Tipo documento</label>
                                        <select class="form-control">	                                    	
	                                        <option value="0">DNI</option>
	                                        <option value="1">PASAPORTE</option>
	                                        <option value="2">C.E.</option>
	                                        <option value="2">OTRO</option>
	                                    </select>                             
                                    </div>
                                </div>
                            	<div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Número de documento</label>
                                        <input class="form-control" name="docCode" placeholder="Número de documento" maxlength="15">
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
                                        <input class="form-control" name="razonSocial" placeholder="Razón social" maxlength="50">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	<div class="col-lg-6">
                                	<label>Porcentaje de descuento</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">%</span>
                                        <input type="text" class="form-control" name="discount" placeholder="Porcentaje de descuento">
                                    </div>
                                </div>
                                <div class="col-lg-6">                                    
                                    <label>Plazo de crédito</label>
                                    <div class="form-group input-group">
                                        <span class="input-group-addon">días</span>
                                        <input class="form-control" name="creditDays" placeholder="Plazo de crédito" maxlength="3">
                                    </div>
                                </div>
                            </div>
                            <div class="row">                                
                                <div class="col-lg-6">                                    
                                    <div class="form-group">
                                        <label>Estado</label>
                                        <select class="form-control">                                           
                                            <option value="0">Activo</option>
                                            <option value="1">Inactivo</option>
                                        </select>                              
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