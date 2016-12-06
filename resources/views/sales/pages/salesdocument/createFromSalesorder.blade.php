@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Documentos de venta</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Datos del documento de venta
                    </div>
                    <div class="panel-body">                        
                        {{Form::open(['route' => 'salesinvoice.store', 'id'=>'formSuggestion'])}} 
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tipo de documento</label>
                                        <select class="form-control" name="tipo_documento" id="tipo_documento">                                           
                                            <option value="0">Seleccione</option>
                                            @foreach($document_types as $document_type)                                    
                                                @if( $document_type->id != 2)
                                                    <option value="{{$document_type->id}}" >{{$document_type->name}}</option>                                    
                                                @endif
                                            @endforeach  
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        @if($salesorder->customer)                                    
                                            @if($salesorder->customer->tipo_contribuyente == 1)
                                                <input hidden value="{{$salesorder->customer->id}}" name="cliente">
                                                <input readonly="readonly" class="form-control" maxlength="50" value="{{$salesorder->customer->nombre}} {{$salesorder->customer->apellido_paterno}} - {{$salesorder->customer->numero_documento}}"> 
                                            @else
                                                <input hidden value="{{$salesorder->customer->id}}" name="cliente">
                                                <input readonly="readonly" class="form-control" maxlength="50" value="{{$salesorder->customer->razon_social}} - {{$salesorder->customer->ruc}}">
                                            @endif
                                        @else
                                            <input hidden value="0" name="cliente">
                                            <input readonly="readonly" class="form-control" maxlength="50">
                                        @endif
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Numeración</label>
                                        <input readonly="readonly" class="form-control" name="numeracion" id="numeracion" maxlength="50">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Fecha de creación</label>
                                        <input value="{{$fecha_creacion}}" readonly="readonly" class="form-control" name="fecha_creacion" maxlength="50">                                                                      
                                </div>                                                                            
                            </div>        
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <div class="form-group">                                   
                                        <label>Comentario</label>
                                        <textarea style="resize:none;"class="form-control none-resisable" rows="3" placeholder="Descripción" name="descripcion">{{$salesorder->descripcion}}</textarea>    
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div class="form-group">                                   
                                        <label>Fecha de vencimiento</label>
                                        <input value="{{$fecha_vencimiento}}" readonly="readonly" class="form-control" name="fecha_vencimiento" maxlength="50">
                                    </div>
                                </div>                              
                            </div>                            
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Detalle
                                </div>  
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
                                            <thead> 
                                                <tr class="headings"> 
                                                    <th>Posición</th>
                                                    <th>Item</th>
                                                    <th>Cantidad</th>                                                                                                                                                                 
                                                    <th>Precio unitario</th> 
                                                    <th>Descuento</th> 
                                                    <th>Total</th> 
                                                </tr> 
                                            </thead> 
                                            <tbody> 
                                                @foreach( $salesorderdetails as $key => $salesorderdetail)
                                                <tr> 
                                                    <input hidden value="{{$salesorder->salesorderdetails[$key]->product->id}}"  name="produc[{{$key+1}}]" >
                                                    <input hidden value="{{$salesorder->salesorderdetails[$key]->cantidad}}"  name="cantidad[{{$key+1}}]" >
                                                    <input hidden value="{{$salesorder->salesorderdetails[$key]->precio_unitario}}" name="precio_unitario[{{$key+1}}]" >
                                                    <input hidden value="{{$salesorder->salesorderdetails[$key]->descuento}}" name="[{{$key+1}}]" >
                                                    <input hidden value="{{$salesorder->salesorderdetails[$key]->total}}" name="[{{$key+1}}]" >
                                                    <td>{{$key+1}}</td>                                                                                 
                                                    <td>{{ $salesorder->salesorderdetails[$key]->product->name }}</td>                                                                                             
                                                    <td>{{ $salesorder->salesorderdetails[$key]->cantidad }}</td>
                                                    <td>{{ $salesorder->salesorderdetails[$key]->precio_unitario }}</td>
                                                    <td>{{ $salesorder->salesorderdetails[$key]->descuento }}</td> 
                                                    <td>{{ $salesorder->salesorderdetails[$key]->total }}</td> 
                                                </tr> 
                                                @endforeach
                                            </tbody> 
                                        </table>
                                    </div>
                                </div>
                            </div>                            
                                
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input readonly="readonly" value="{{$salesorder->descuento_manual}}" class="form-control" name="descuento_manual" id="descuento_manual" placeholder="Descuento Manual" maxlength="7">
                                    </div>
                                </div>
                                <div class="pull-right col-lg-1">
                                    <label> Descuento manual</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input readonly="readonly" value="{{$salesorder->sub_total}}" readonly="readonly" class="form-control" name="sub_total" id="sub_total" placeholder="Sub Total" maxlength="50">
                                    </div>
                                </div>
                                <div class="pull-right col-lg-1">
                                    <label>Sub Total</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input readonly="readonly" value="{{$salesorder->igv}}" readonly="readonly" class="form-control" name="igv" id="igv" placeholder="IGV" maxlength="50">
                                    </div>                                   
                                </div>    
                                <div class="pull-right col-lg-1">
                                    <label>IGV</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input readonly="readonly" value="{{$salesorder->total}}" readonly="readonly" class="form-control" name="total_documento_venta" id="total_documento_venta" placeholder="Total" maxlength="50">
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

    $("body").on('change', "#tipo_documento", function(){                
        var idDocumentType = $('#tipo_documento').val();
        if (idDocumentType == 0){
            $('#numeracion').attr("value", "");                 
            return;  
        } 
        $.ajax({
            method: 'GET',
            url: "{{ route('salesinvoice.findNumberDocument')}}",            
            data: {
                id: idDocumentType,                
            },
            success: function(data) {                
                numeracion    = data.numeracion;                                
                $('#numeracion').attr("value", numeracion);                 
            }
        });      
        
    });    
    
});


</script>


@endsection