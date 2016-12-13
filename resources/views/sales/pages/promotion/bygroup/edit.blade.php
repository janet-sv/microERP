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
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Datos de la promoción
                    </div>
                    <div class="panel-body">
                        {{Form::open(['route' => ['promotionbygroup.update', $promotion->id], 'id'=>'formSuggestion'])}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" name="nombre" placeholder="Nombre" maxlength="50" value="{{$promotion->nombre}}">
                                    </div>
                                </div>                                                                       
                            </div>        
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    {{Form::label('Fecha inicio ',null, ['class'=>'control-label'] )}}                                    
                                    <div class="input-group date" id="fecha_inicio">
                                        <input value="{{$promotion->fecha_inicio}}" type="text" class="form-control input-date" name="fecha_inicio" placeholder="aaaa-mm-dd" maxlength="10" required/>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>                                      
                                </div>
                                <div class="form-group col-lg-6">
                                    {{Form::label('Fecha fin ',null,['class'=>'control-label'])}}                                    
                                    <div class="input-group date" id="fecha_fin">
                                        <input value="{{$promotion->fecha_fin}}" type="text" class="form-control input-date" name="fecha_fin" placeholder="aaaa-mm-dd" maxlength="10" required/>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>                                      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <div class="form-group">                                   
                                        <label>Descripción</label>
                                        <textarea style="resize:none;"class="form-control none-resisable" rows="3" placeholder="Descripción" name="descripcion">{{$promotion->descripcion}}</textarea>    
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
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Detalle
                                </div>  
                                <div class="panel-body">                                                                                   
                                    <div id="promotion">
                                        @foreach( $promodetails as $key => $promodetail)
                                        <div class="row">
                                            <input hidden name="idpromodetail[{{$key + 1}}]" value="{{$promotion->promodetails[$key]->id}}"></input>                                                            
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    @if( $key == 0 ) <label>Categoría de producto</label> @endif
                                                    <select class="form-control" name="categoryproduct[{{$key + 1}}]" id="categoryproduct_{{$key + 1}}">                                           
                                                        <option value="0">Seleccione</option>
                                                        @foreach($categoryproducts as $categoryproduct)                                    
                                                            <option value="{{$categoryproduct->id}}" @if($categoryproduct->id==$promotion->promodetails[$key]->product->category->id) selected @endif >{{$categoryproduct->name}}</option>                                    
                                                        @endforeach  
                                                    </select>
                                                </div>
                                            </div>                                   
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    @if( $key == 0 ) <label>Producto</label> @endif
                                                    <select class="form-control" name="product[{{$key + 1}}]" id="product{{$key + 1}}">                                           
                                                        <option value="0">Seleccione una categoría</option>                                            
                                                    </select>
                                                </div>
                                            </div>                                                               
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    @if( $key == 0 ) <label>Cantidad</label> @endif
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">u</span>
                                                        <input value="{{$promotion->promodetails[$key]->cantidad_descuento}}" class="form-control" name="cantidad_descuento[{{$key + 1}}]" placeholder="Cantidad" maxlength="3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    @if( $key == 0 ) <label>Porcentaje de descuento</label> @endif
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">%</span>
                                                        <input value="{{$promotion->promodetails[$key]->porcentaje_descuento}}" type="text" class="form-control" name="porcentaje_descuento[{{$key + 1}}]" placeholder="Porcentaje de descuento">
                                                    </div>
                                                </div>
                                            </div>                                
                                        </div> 
                                        @endforeach                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">                                    
                                    {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}                                      
                                    <a href="{{route('promotionbygroup.index')}}" class="btn btn-default pull-right">Cancelar</a>                                      
                                </div>
                            </div>
                        {{Form::close()}}
                    </div>                              
                </div>
            </div>                              
        </div>  
</section>

<script src="{{ URL::asset('build/js/sales/promotion.js')}}"></script>
<script type="text/javascript">
$(document).ready(function($) {
    
    @foreach( $promodetails as $key => $promodetail)
        $.ajax({
            method: 'GET',
            url: "{{ route('promotionbygroup.findProductsInEdit')}}",            
            data: {
                option: $('#categoryproduct_{{$key+1}}').val(), 
                idProduct: {{$promotion->promodetails[$key]->product->id}},
            },
            success: function(response) {                
                $('#product{{$key+1}}').html(response['html']);
            }
        });
    @endforeach

    var n={{count($promodetails)}} + 1;

    $("#add").click(function() {
        var x = $("#add").attr('disabled');
        if (typeof x !== typeof undefined && x !== false) {return;  }        
        if(n==25){return;}        
        $("#promotion").append('' +  
            ' <div class="row promoLine"> ' +   
                ' <input hidden name="idpromodetail[' + n + ']" value="0"></input> '+                                                        
                ' <div class="col-lg-3"> ' +
                    ' <div class="form-group"> ' +                        
                        ' <select class="form-control" name="categoryproduct[' + n + ']" id="categoryproduct_' + n +'"> ' +                                           
                            ' <option value="0">Seleccione</option> ' +  
                            '@foreach($categoryproducts as $categoryproduct) ' +                                   
                                '<option value="{{$categoryproduct->id}}" >{{$categoryproduct->name}}</option>' +                                    
                            '@endforeach ' +
                        ' </select> ' +
                    ' </div> ' +
                ' </div>' +                                   
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +                        
                        ' <select class="form-control" name="product[' + n + ']" id="product' + n +'" > ' +                                           
                            ' <option value="0"> Seleccione una categoría</option>' +                                                                                        
                        ' </select>' +
                    ' </div>' +
                ' </div>' +                                                               
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +                        
                        ' <div class="form-group input-group">' +
                            ' <span class="input-group-addon"> u </span>' +
                            ' <input class="form-control" name="cantidad_descuento[' + n + ']" placeholder="Cantidad" maxlength="3">' +
                        ' </div>' +
                    ' </div>' +
                ' </div>' +
                ' <div class="col-lg-3">' +
                    ' <div class="form-group">' +                        
                        ' <div class="form-group input-group">' +
                            ' <span class="input-group-addon"> % </span>' +
                            ' <input type="text" class="form-control" name="porcentaje_descuento[' + n +']" placeholder="Porcentaje de descuento">' +
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
        if(n=={{count($promodetails)}} + 1 ){return}
            $(".promoLine:last-child").remove();
        n--;
    });   
    
    $("body").on('change', "[id^='categoryproduct_']", function(){        
        var id = this.id.split('_')[1];            
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