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
                        {{Form::open(['route' => 'promotionbyproduct.store', 'id'=>'formSuggestion'])}}   	
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
                                                @foreach($promoconditions as $promocondition)                                    
                                                    <option value="{{$promocondition->id}}" >{{$promocondition->nombre}}</option>                                    
                                                @endforeach                                             
                                        </select>
                                    </div>
                                </div> 
                        	</div>        
                            <div class="row">          
                                <div class="form-group col-lg-6">
                                    {{Form::label('Fecha inicio ',null, ['class'=>'control-label'] )}}                                    
                                    <div class="input-group date" id="fecha_inicio">
                                        <input type="text" class="form-control input-date" name="fecha_inicio" placeholder="aaaa-mm-dd" maxlength="10" required/>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>                                      
                                </div>
                                <div class="form-group col-lg-6">
                                    {{Form::label('Fecha fin ',null,['class'=>'control-label'])}}                                    
                                    <div class="input-group date" id="fecha_fin">
                                        <input type="text" class="form-control input-date" name="fecha_fin" placeholder="aaaa-mm-dd" maxlength="10" required/>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>                                      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Categoría de producto</label>
                                        <select class="form-control" name="categoria_producto">                                           
                                            <option value="0">Seleccione</option>
                                            @foreach($categoryproducts as $categoryproduct)                                    
                                                <option value="{{$categoryproduct->id}}" >{{$categoryproduct->nombre}}</option>                                    
                                            @endforeach                                            
                                        </select>
                                    </div>
                                </div>                                   
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Producto</label>
                                        <select class="form-control" name="producto">                                           
                                            <option value="0">Seleccione</option>
                                            @foreach($products as $product)                                    
                                                <option value="{{$product->id}}" >{{$product->nombre}}</option>                                    
                                            @endforeach                                                                                             
                                        </select>
                                    </div>
                                </div>                                                               
                            </div>                            
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-lg-6">                                    
                                        <label>Descripción</label>
                                        <textarea style="resize:none;"class="form-control none-resisable" name="descripcion" rows="3" placeholder="Descripción" ></textarea>    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">                                    
                                    {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}                                       
                                    <a href="{{route('promotionbyproduct.index')}}" class="btn btn-default pull-right">Cancelar</a>                                      
                                </div>
                            </div>
                        {{Form::close()}}
                    </div>                              
				</div>
			</div>                              
		</div>	
</section>

<script src="{{ URL::asset('build/js/sales/promotionbyproduct.js')}}"></script>

@endsection