@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar condición de promoción</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Datos de la condición
                    </div>
                    <div class="panel-body">
                        {{Form::open(['route' => ['promocondition.update', $promocondition->id], 'id'=>'formSuggestion'])}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre</label>                                        
                                        <input class="form-control" name="nombre" placeholder="Nombre" maxlength="50" value="{{$promocondition->nombre}}">
                                    </div>
                                </div>                                      
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Cantidad requerida</label>
                                        <input class="form-control" name="cantidad_requerida" placeholder="Cantidad requerida" maxlength="3" value="{{$promocondition->cantidad_requerida}}">
                                    </div>
                                </div> 
                            </div>        
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Cantidad de descuento</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">u</span>
                                            <input class="form-control" name="cantidad_descuento" placeholder="Cantidad de descuento" maxlength="3" value="{{$promocondition->cantidad_descuento}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Porcentaje de descuento</label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">%</span>
                                            <input type="text" class="form-control" name="porcentaje_descuento" placeholder="Porcentaje de descuento" value="{{$promocondition->porcentaje_descuento}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">  
                                    <div class="form-group">                                  
                                        <label>Descripción</label>
                                        <textarea style="resize:none;" name="descripcion" class="form-control none-resisable" rows="3" placeholder="Descripción">{{$promocondition->descripcion}}</textarea>    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12"> 
                                    {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}                                                                       
                                    <a class="btn btn-default pull-right" href="{{ route('promocondition.index') }}">Cancelar</a>
                                </div>
                            </div>
                        {{Form::close()}}
                    </div>                              
                </div>
            </div>                              
        </div>  
</section>

@endsection