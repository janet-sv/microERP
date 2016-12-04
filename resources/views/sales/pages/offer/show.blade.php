@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Proformas</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos de la proforma
                    </div>
                    <div class="panel-body">                        
                        
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Numeración</label>
                                        <input readonly="readonly" value="{{$offer->numeracion}}" readonly="readonly" class="form-control" name="numeracion" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        <select readonly="readonly" class="form-control" name="cliente" id="cliente">                                           
                                            <option value="0">Seleccione</option>
                                            @foreach($customers as $customer)                                    
                                                @if($customer->tipo_contribuyente == 1)
                                                    <option value="{{$customer->id}}" @if($customer->id==$offer->customer->id) selected @endif > {{$customer->nombre}} {{$customer->apellido_paterno}} - {{$customer->numero_documento}}</option>                                    
                                                @else
                                                    <option value="{{$customer->id}}" @if($customer->id==$offer->customer->id) selected @endif > {{$customer->razon_social}} - {{$customer->ruc}}</option>                                    
                                                @endif
                                            @endforeach  
                                        </select>
                                    </div>
                                </div>                                                                          
                            </div>        
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    {{Form::label('Fecha inicio ',null, ['class'=>'control-label'] )}}                                    
                                    <div class="input-group date" id="fecha_inicio">
                                        <input readonly="readonly" value="{{$offer->fecha_inicio}}" type="text" class="form-control input-date" name="fecha_inicio" placeholder="aaaa-mm-dd" maxlength="10" required/>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>                                      
                                </div>
                                <div class="form-group col-lg-6">
                                    {{Form::label('Fecha fin ',null,['class'=>'control-label'])}}                                    
                                    <div class="input-group date" id="fecha_fin">
                                        <input readonly="readonly" value="{{$offer->fecha_fin}}" type="text" class="form-control input-date" name="fecha_fin" placeholder="aaaa-mm-dd" maxlength="10" required/>
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    </div>                                      
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <div class="form-group">                                   
                                        <label>Comentario</label>
                                        <textarea readonly="readonly" style="resize:none;"class="form-control none-resisable" rows="3" placeholder="Descripción" name="descripcion">{{$offer->descripcion}}</textarea>    
                                    </div>
                                </div>                                
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detalle
                                </div>  
                                <div class="panel-body">                                                                                   
                                    <div id="promotion">
                                        @foreach( $offerdetails as $key => $offerdetail)
                                        <div class="row">  
                                            <input hidden name="idofferdetail[{{$key+1}}]" value="{{$offer->offerdetails[$key]->id}}"></input>                                                          
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    @if( $key == 0 ) <label>Categoría de producto</label> @endif
                                                    <select readonly="readonly" class="form-control" name="categoryproduct[{{$key+1}}]" id="categoryproduct_{{$key + 1}}">                                           
                                                        <option value="0">Seleccione</option>
                                                        @foreach($categoryproducts as $categoryproduct)                                    
                                                            <option value="{{$categoryproduct->id}}" @if($categoryproduct->id==$offer->offerdetails[$key]->product->category->id) selected @endif >{{$categoryproduct->name}}</option>                                    
                                                        @endforeach  
                                                    </select>
                                                </div>
                                            </div>                                   
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    @if( $key == 0 ) <label>Producto</label> @endif
                                                    <select readonly="readonly" class="form-control" name="product[{{$key+1}}]" id="product_{{$key + 1}}">                                           
                                                        <option readonly="readonly" value="0">Seleccione</option>                                            
                                                    </select>
                                                </div>
                                            </div>                                                               
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    @if( $key == 0 ) <label>Cantidad</label> @endif
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">u</span>
                                                        <input readonly="readonly" value="{{$offer->offerdetails[$key]->cantidad}}" max="999" type="number" class="form-control" name="cantidad[{{$key+1}}]" id="cantidad_{{$key + 1}}" placeholder="Cantidad" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    @if( $key == 0 ) <label>Precio unitario</label> @endif
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">S/</span>
                                                        <input readonly="readonly" value="{{$offer->offerdetails[$key]->precio_unitario}}" type="text" class="form-control" name="precio[{{$key+1}}]" id="precio_{{$key + 1}}" placeholder="Precio unitario">
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    @if( $key == 0 ) <label>Descuento</label> @endif
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">S/</span>
                                                        <input readonly="readonly" value="{{$offer->offerdetails[$key]->descuento}}" type="text" class="form-control" name="descuento[{{$key+1}}]" id="descuento_{{$key + 1}}" placeholder="Descuento">
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="col-lg-2">
                                                <div class="form-group">
                                                    @if( $key == 0 ) <label>Total</label> @endif
                                                    <div class="form-group input-group">
                                                        <span class="input-group-addon">S/</span>
                                                        <input readonly="readonly" value="{{$offer->offerdetails[$key]->total}}" type="text" class="form-control" name="total[{{$key+1}}]" id="total_{{$key + 1}}" placeholder="Total">
                                                    </div>
                                                </div>
                                            </div>                                
                                        </div> 
                                        @endforeach                                         
                                    </div>
                                </div>
                            </div>                            
                                
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input value="{{$offer->descuento_manual}}" readonly="readonly" class="form-control" name="descuento_manual" id="descuento_manual" placeholder="Descuento Manual" maxlength="7">
                                    </div>
                                </div>
                                <div class="pull-right col-lg-1">
                                    <label> Descuento manual</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input value="{{$offer->sub_total}}" readonly="readonly" class="form-control" name="sub_total" id="sub_total" placeholder="Sub Total" maxlength="50">
                                    </div>
                                </div>
                                <div class="pull-right col-lg-1">
                                    <label>Sub Total</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input value="{{$offer->igv}}" readonly="readonly" class="form-control" name="igv" id="igv" placeholder="IGV" maxlength="50">
                                    </div>                                   
                                </div>    
                                <div class="pull-right col-lg-1">
                                    <label>IGV</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input value="{{$offer->total}}" readonly="readonly" class="form-control" name="total_proforma" id="total_proforma" placeholder="Total" maxlength="50">
                                    </div>                                   
                                </div>    
                                <div class="pull-right col-lg-1">
                                    <label>Total</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">                                                                        
                                    <a href="{{route('offer.index')}}" class="btn btn-default pull-right">Cancelar</a>                                      
                                </div>
                            </div>
                                
                        
                    </div>                              
                </div>
            </div>                              
        </div>  
</section>

<script src="{{ URL::asset('build/js/sales/offer.js')}}"></script>
<script type="text/javascript">
$(document).ready(function($) {
    
    @foreach( $offerdetails as $key => $offerdetail)
        $.ajax({
            method: 'GET',
            url: "{{ route('offer.findProductsInEdit')}}",            
            data: {
                option: $('#categoryproduct_{{$key+1}}').val(), 
                idProduct: {{$offer->offerdetails[$key]->product->id}},
            },
            success: function(response) {                
                $('#product_{{$key+1}}').html(response['html']);
            }
        });
    @endforeach

    var n={{count($offerdetails)}} + 1;

    $("#add").click(function() {
        var x = $("#add").attr('readonly="readonly"');
        if (typeof x !== typeof undefined && x !== false) {return;  }        
        if(n==25){return;}        
        $("#promotion").append('' +  
            ' <div class="row promoLine"> ' + 
                ' <input hidden name="idofferdetail[' + n + ']" value="0"></input>' +
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
            url: "{{ route('offer.findProducts')}}",            
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
            url: "{{ route('offer.findPrice')}}",            
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
            url: "{{ route('offer.findPrice')}}",            
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
        $('#total_proforma').attr("value", parseFloat(total).toFixed(1) ); 
    }
});


</script>


@endsection