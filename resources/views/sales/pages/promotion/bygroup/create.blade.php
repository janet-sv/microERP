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
                                                    <select class="form-control" name="categoryproduct_1" id="categoryproduct_1">                                           
                                                        <option value="0">Seleccione</option>
                                                        @foreach($categoryproducts as $categoryproduct)                                    
                                                            <option value="{{$categoryproduct->id}}" >{{$categoryproduct->name}}</option>                                    
                                                        @endforeach  
                                                    </select>
                                                </div>
                                            </div>                                   
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Producto</label>
                                                    <select class="form-control" name="product1" id="product1">                                           
                                                        <option value="0">Seleccione una categoría</option>                                            
                                                    </select>
                                                </div>
                                            </div>                                                               
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label>Cantidad</label>
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
                                                    <select class="form-control" name="categoryproduct_2" id="categoryproduct_2">                                           
                                                        <option value="0">Seleccione</option>
                                                        @foreach($categoryproducts as $categoryproduct)                                    
                                                            <option value="{{$categoryproduct->id}}" >{{$categoryproduct->name}}</option>                                    
                                                        @endforeach                                          
                                                    </select>
                                                </div>
                                            </div>                                   
                                            <div class="col-lg-3">
                                                <div class="form-group">                                                    
                                                    <select class="form-control" name="product2" id="product2">                                           
                                                        <option value="0">Seleccione una categoría</option>                                            
                                                    </select>
                                                </div>
                                            </div>                                                               
                                            <div class="col-lg-3">
                                                <div class="form-group">                                                    
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">u</span>
                                                        <input class="form-control" name="cantidad_descuento2" placeholder="Cantidad" maxlength="3">
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
<script type="text/javascript">
$(document).ready(function($) {
    
    var n=3;
    $("#add").click(function() {
        var x = $("#add").attr('disabled');
        if (typeof x !== typeof undefined && x !== false) {return;  }        
        if(n==25){return;}        
        $("#promotion").append('' +  
            ' <div class="row promoLine"> ' +                                                           
                ' <div class="col-lg-3"> ' +
                    ' <div class="form-group"> ' +                        
                        ' <select class="form-control" name="categoryproduct_' + n + '" id="categoryproduct_' + n +'"> ' +                                           
                            ' <option value="0">Seleccione</option> ' +  
                            '@foreach($categoryproducts as $categoryproduct) ' +                                   
                                '<option value="{{$categoryproduct->id}}" >{{$categoryproduct->name}}</option>' +                                    
                            '@endforeach ' +
                        ' </select> ' +
                    ' </div> ' +
                ' </div>' +                                   
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +                        
                        ' <select class="form-control" name="product' + n + '" id="product' + n +'" > ' +                                           
                            ' <option value="0"> Seleccione una categoría</option>' +                                                                                        
                        ' </select>' +
                    ' </div>' +
                ' </div>' +                                                               
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +                        
                        ' <div class="form-group input-group">' +
                            ' <span class="input-group-addon"> u </span>' +
                            ' <input class="form-control" name="cantidad_descuento' + n + '" placeholder="Cantidad" maxlength="3">' +
                        ' </div>' +
                    ' </div>' +
                ' </div>' +
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +                        
                        ' <div class="form-group input-group">' +
                            ' <span class="input-group-addon"> % </span>' +
                            ' <input type="text" class="form-control" name="porcentaje_descuento' + n +'" placeholder="Porcentaje de descuento">' +
                        ' </div>' +
                    ' </div>' +
                ' </div>' +                                
            ' </div>' 
        );        

        n++;           
    });
    $("#remove").click(function() {
        var x = $("#remove").attr('disabled');
        if (typeof x !== typeof undefined && x !== false) {return;  }
        if(n==1){return}
            $(".promoLine:last-child").remove();
        n--;
    });   
    
    $("body").on('change', "[id^='categoryproduct_']", function(){        
        var id = this.id.split('_')[1];    
        console.log("entro aqui con id:" + this);
        $.ajax({
            method: 'GET',
            url: "{{ route('promotionbygroup.findProducts')}}",            
            data: {
                option: $('#categoryproduct_'+ id).val(),                     
            },
            success: function(response) {
                $('#product' + id).html(response['html']);
            }
        });    
    });
    



});


</script>


@endsection