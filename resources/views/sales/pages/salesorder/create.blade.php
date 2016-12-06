@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Pedidos de venta</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Datos del pedido de venta
                    </div>
                    <div class="panel-body">
                        {{Form::open(['route' => 'salesorder.store', 'id'=>'formSuggestion'])}}     
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Numeración</label>
                                        <input readonly="readonly" class="form-control" name="numeracion" value="{{$numeracion}}" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select class="form-control" name="cliente" id="cliente">                                           
                                            <option value="0">Seleccione</option>
                                            @foreach($customers as $customer)                                    
                                                @if($customer->tipo_contribuyente == 1)
                                                    <option value="{{$customer->id}}" > {{$customer->nombre}} {{$customer->apellido_paterno}} - {{$customer->numero_documento}}</option>                                    
                                                @else
                                                    <option value="{{$customer->id}}" > {{$customer->razon_social}} - {{$customer->ruc}}</option>                                    
                                                @endif
                                            @endforeach  
                                        </select>
                                    </div>
                                </div>                                                                          
                            </div>        
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <div class="form-group">                                   
                                        <label>Comentario</label>
                                        <textarea style="resize:none;"class="form-control none-resisable" rows="3" placeholder="Descripción" name="descripcion"></textarea>    
                                    </div>
                                </div>                                
                                <div class="form-group col-lg-6">
                                    {{Form::label('Fecha creacion ',null, ['class'=>'control-label'] )}}                                    
                                    <div class="input-group date" id="fecha_inicio">
                                        <input type="text" class="form-control input-date" name="fecha_creacion" placeholder="aaaa-mm-dd" maxlength="10" required/>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>                                      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <label>Detalle del pedido de venta</label>                                                                          
                                    <div class="form-group"> 
                                        <a id="add_promocion" class="btn btn-success">Agregar promoción</a>
                                        <a id="add" class="btn btn-warning">Agregar detalle</a>
                                        <a id="remove" class="btn btn-danger">Eliminar detalle</a>
                                    </div>                                    
                                </div>    
                            </div>
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    Detalle
                                </div>  
                                <div class="panel-body">                                                                                   
                                    <div id="promotion">
                                        <div class="row">                                                            
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Categoría de producto</label>
                                                    <select class="form-control" name="categoryproduct[1]" id="categoryproduct_1">                                           
                                                        <option value="0">Seleccione</option>
                                                        @foreach($categoryproducts as $categoryproduct)                                    
                                                            <option value="{{$categoryproduct->id}}" >{{$categoryproduct->name}}</option>                                    
                                                        @endforeach  
                                                    </select>
                                                </div>
                                            </div>                                   
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Producto</label>
                                                    <select class="form-control" name="product[1]" id="product_1">                                           
                                                        <option value="0">Seleccione</option>                                            
                                                    </select>
                                                </div>
                                            </div>                                                               
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Cantidad</label>
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">u</span>
                                                        <input max="999" type="number" class="form-control" name="cantidad[1]" id="cantidad_1" placeholder="Cantidad" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Precio unitario</label>
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">S/</span>
                                                        <input readonly="readonly" type="text" class="form-control" name="precio[1]" id="precio_1" placeholder="Precio unitario">
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Descuento</label>
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">S/</span>
                                                        <input readonly="readonly" type="text" class="form-control" name="descuento[1]" id="descuento_1" placeholder="Descuento">
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    <label>Total</label>
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">S/</span>
                                                        <input readonly="readonly" type="text" class="form-control" name="total[1]" id="total_1" placeholder="Total">
                                                    </div>
                                                </div>
                                            </div>                                
                                        </div>                                         
                                    </div>
                                </div>
                            </div>                            
                                
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input class="form-control" name="descuento_manual" id="descuento_manual" placeholder="Descuento Manual" maxlength="7">
                                    </div>
                                </div>
                                <div class="pull-right col-lg-1">
                                    <label> Descuento manual</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input readonly="readonly" class="form-control" name="sub_total" id="sub_total" placeholder="Sub Total" maxlength="50">
                                    </div>
                                </div>
                                <div class="pull-right col-lg-1">
                                    <label>Sub Total</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input readonly="readonly" class="form-control" name="igv" id="igv" placeholder="IGV" maxlength="50">
                                    </div>                                   
                                </div>    
                                <div class="pull-right col-lg-1">
                                    <label>IGV</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input readonly="readonly" class="form-control" name="total_pedido_venta" id="total" placeholder="Total" maxlength="50">
                                    </div>                                   
                                </div>    
                                <div class="pull-right col-lg-1">
                                    <label>Total</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">                                    
                                    {{Form::submit('Guardar', ['class'=>'btn btn-success pull-right'])}}                                      
                                    <a href="{{route('salesorder.index')}}" class="btn btn-default pull-right">Cancelar</a>                                      
                                </div>
                            </div>
                                
                        {{Form::close()}}
                    </div>                              
                </div>
            </div>                              
        </div>  
</section>

<script src="{{ URL::asset('build/js/sales/salesorder.js')}}"></script>
<script type="text/javascript">
$(document).ready(function($) {
    
    var n=2;
    $("#add").click(function() {
        var x = $("#add").attr('readonly="readonly"');
        if (typeof x !== typeof undefined && x !== false) {return;  }        
        if(n==25){return;}        
        $("#promotion").append('' +  
            ' <div class="row promoLine"> ' +                                                           
                ' <div class="col-lg-2"> ' +
                    ' <div class="form-group"> ' +                        
                        ' <select class="form-control" name="categoryproduct[' + n + ']" id="categoryproduct_' + n +'"> ' +                                           
                            ' <option value="0">Seleccione</option> ' +  
                            '@foreach($categoryproducts as $categoryproduct) ' +                                   
                                '<option value="{{$categoryproduct->id}}" >{{$categoryproduct->name}}</option>' +                                    
                            '@endforeach ' +
                        ' </select> ' +
                    ' </div> ' +
                ' </div>' +                                   
                ' <div class="col-lg-2">' +
                    ' <div class="form-group">' +                        
                        ' <select class="form-control" name="product[' + n + ']" id="product_' + n +'" > ' +                                           
                            ' <option value="0">Seleccione</option>' +                                                                                        
                        ' </select>' +
                    ' </div>' +
                ' </div>' +                                                               
                ' <div class="col-lg-2">' +
                    ' <div class="form-group">' +                        
                        ' <div class="form-group input-group">' +
                            ' <span class="input-group-addon"> u </span>' +
                            ' <input max="999" type="number" class="form-control" name="cantidad[' + n + ']" id="cantidad_' + n + '" placeholder="Cantidad" maxlength="3">' +
                        ' </div>' +
                    ' </div>' +
                ' </div>' +
                '<div class="col-lg-2"> ' +
                    ' <div class="form-group"> ' +                        
                        ' <div class="form-group input-group"> ' +
                            ' <span class="input-group-addon">S/</span> ' +
                            ' <input readonly="readonly" type="text" class="form-control" name="precio[' + n +']" id="precio_' + n +'" placeholder="Precio unitario"> ' +
                        ' </div> '+
                    ' </div> '+
                ' </div>  '+
                ' <div class="col-lg-2">' +
                    ' <div class="form-group">' +                        
                        ' <div class="form-group input-group">' +
                            ' <span class="input-group-addon">S/</span>' +
                            ' <input type="text" readonly="readonly" class="form-control" name="descuento[' + n +']" id="descuento_' + n + '" placeholder="Descuento">' +
                        ' </div>' +
                    ' </div>' +
                ' </div>' +                                
                '<div class="col-lg-2"> ' +
                    ' <div class="form-group"> ' +                        
                        ' <div class="form-group input-group"> ' +
                            ' <span class="input-group-addon">S/</span> ' +
                            ' <input readonly="readonly" type="text" class="form-control" name="total[' + n +']" id="total_' + n + '" placeholder="Total">' +
                        ' </div> '+
                    ' </div> '+
                ' </div> ' +
            ' </div>' 
        );        

        n++;           
    });
    $("#remove").click(function() {
        var x = $("#remove").attr('readonly="readonly"');
        if (typeof x !== typeof undefined && x !== false) {return;  }
        if(n==2){return}
            $(".promoLine:last-child").remove();
        n--;
        calcularTotal();
    });   
    
    $("body").on('change', "[id^='categoryproduct_']", function(){        
        var id = this.id.split('_')[1];            
        $.ajax({
            method: 'GET',
            url: "{{ route('salesorder.findProducts')}}",            
            data: {
                option: $('#categoryproduct_'+ id).val(),                     
            },
            success: function(response) {
                $('#product_' + id).html(response['html']);
                $('#precio_' + id).attr("value", "");    
                $('#cantidad_' + id).val("");        
                $('#descuento_' + id).attr("value", "");        
                $('#total_' + id).attr("value", "");     
                calcularTotal();   
            }
        });    
    });
    
    $("body").on('change', "[id^='product_']", function(){        
        var id = this.id.split('_')[1];
        var idProduct = $('#product_' + id).val();
        var idCustomer = $('#cliente').val();
        $('#cantidad_' + id).val(1);        
        $.ajax({
            method: 'GET',
            url: "{{ route('salesorder.findPrice')}}",            
            data: {
                option: idProduct,
                cliente: idCustomer                    
            },
            success: function(data) {
                $('#precio_' + id).attr("value", data.precio);                
                $('#descuento_' + id).attr("value", parseFloat(data.descuento).toFixed(1) );                        
                $('#total_' + id).attr("value", parseFloat(data.precio - data.descuento).toFixed(1) );   
                calcularTotal();
            }
        });    
    });

    $("body").on('keyup', "[id^='cantidad_']", function(){        
        var id        = this.id.split('_')[1];  
        var idProduct = $('#product_' + id).val();
        var idCustomer = $('#cliente').val();
        var cantidad  = $('#cantidad_' + id).val();        
        var precio ;                
        var descuento;                                
        if( cantidad == 0){
            cantidad = 1;
            $('#cantidad_' + id).val(cantidad);        
        } else{
            $('#cantidad_' + id).val(cantidad.slice(0,3));
        }

        $.ajax({
            method: 'GET',
            url: "{{ route('salesorder.findPrice')}}",            
            data: {
                option: idProduct,
                cliente: idCustomer                    
            },
            success: function(data) {                
                precio    = data.precio;                      
                descuento = data.descuento;                                      
                $('#descuento_' + id).attr("value", parseFloat(descuento*cantidad).toFixed(1));
                 descuento = $('#descuento_' + id).attr("value");
                $('#total_' + id).attr("value", parseFloat((precio*cantidad)-descuento).toFixed(1) );   
                calcularTotal();
            }
        });            
        
        
    });
    
    $("body").on('keyup', "#descuento_manual", function(){                
        calcularTotal();
    });

    function calcularTotal(){
        var idLinea, total = 0;
        for( var j = 1 ; j < n ; j++){
            if (  $('#cantidad_' + j).val() ){                    
                total = parseFloat(total) + parseFloat($('#total_' + j).attr("value"));                   
            }
        }                
        var descuento_manual = $("#descuento_manual").val();  
        if (descuento_manual == 0)      
            descuento_manual = 0;
        total = total - descuento_manual;

        var sub_total = total / 1.18;
        var igv  = total - sub_total;

        $('#sub_total').attr("value", parseFloat(sub_total).toFixed(1));   
        $('#igv').attr("value", parseFloat(igv).toFixed(1));   
        $('#total').attr("value", parseFloat(total).toFixed(1) ); 
    }
});


</script>


@endsection