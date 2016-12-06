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
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Tipo de documento</label>
                                        <input readonly="readonly" class="form-control" value="{{$salesinvoice->document_type->name}}" name="document">                                        
                                    </div>
                                </div> 
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Cliente</label>
                                        @if($salesinvoice->customer)                                    
                                            @if($salesinvoice->customer->tipo_contribuyente == 1)                                                
                                                <input readonly="readonly" class="form-control" maxlength="50" value="{{$salesinvoice->customer->nombre}} {{$salesinvoice->customer->apellido_paterno}} - {{$salesinvoice->customer->numero_documento}}"> 
                                            @else                                                
                                                <input readonly="readonly" class="form-control" maxlength="50" value="{{$salesinvoice->customer->razon_social}} - {{$salesinvoice->customer->ruc}}">
                                            @endif
                                        @else                                            
                                            <input readonly="readonly" class="form-control" maxlength="50">
                                        @endif
                                    </div>
                                </div>
                            </div>   
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Numeración</label>
                                        <input value="{{$salesinvoice->number}}" readonly="readonly" class="form-control" name="numeracion" id="numeracion" maxlength="50">
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div class="form-group">                                   
                                        <label> Estado</label>
                                        <input readonly="readonly" value="{{$salesinvoice->stateinvoice->name}}" class="form-control" name="descuento_manual" id="descuento_manual" maxlength="7">
                                    </div>
                                </div>
                            </div>        
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <div class="form-group">                                   
                                        <label> Referencia</label>
                                        <input readonly="readonly" value="{{$salesinvoice->reference}}" class="form-control" name="descuento_manual" id="descuento_manual" maxlength="7">
                                    </div>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Fecha de creación</label>
                                    <input value="{{$salesinvoice->date_invoice}}" readonly="readonly" class="form-control" name="fecha_creacion" maxlength="50">                                                                      
                                </div>
                            </div>                                                                            
                            <div class="row">
                                <div class="col-lg-6"> 
                                    <div class="form-group">                                   
                                        <label>Comentario</label>
                                        <textarea style="resize:none;" readonly="readonly" class="form-control none-resisable" rows="3" name="descripcion">{{$salesinvoice->description}}</textarea>    
                                    </div>
                                </div>
                                <div class="col-lg-6"> 
                                    <div class="form-group">                                   
                                        <label>Fecha de vencimiento</label>
                                        <input value="{{$salesinvoice->date_due}}" readonly="readonly" class="form-control" name="fecha_vencimiento" maxlength="50">
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
                                                @foreach( $salesinvoicedetails as $key => $salesinvoicedetail)
                                                <tr>                                                     
                                                    <td>{{$key+1}}</td>                                                                                 
                                                    <td>{{ $salesinvoice->detailSales[$key]->product->name }}</td>                                                                                             
                                                    <td>{{ $salesinvoice->detailSales[$key]->amount }}</td>
                                                    <td>{{ $salesinvoice->detailSales[$key]->unitprice }}</td>
                                                    <td>{{ $salesinvoice->detailSales[$key]->discounts }}</td> 
                                                    <td>{{ $salesinvoice->detailSales[$key]->total }}</td> 
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
                                        <input readonly="readonly" value="{{$salesinvoice->discount}}" class="form-control" name="descuento_manual" id="descuento_manual" placeholder="Descuento Manual" maxlength="7">
                                    </div>
                                </div>
                                <div class="pull-right col-lg-1">
                                    <label> Descuento manual</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input readonly="readonly" value="{{$salesinvoice->subtotal}}" readonly="readonly" class="form-control" name="sub_total" id="sub_total" placeholder="Sub Total" maxlength="50">
                                    </div>
                                </div>
                                <div class="pull-right col-lg-1">
                                    <label>Sub Total</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input readonly="readonly" value="{{$salesinvoice->igv}}" readonly="readonly" class="form-control" name="igv" id="igv" placeholder="IGV" maxlength="50">
                                    </div>                                   
                                </div>    
                                <div class="pull-right col-lg-1">
                                    <label>IGV</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="pull-right col-lg-3"> 
                                    <div class="form-group">                                   
                                        <input readonly="readonly" value="{{$salesinvoice->amount_total_signed}}" readonly="readonly" class="form-control" name="total_documento_venta" id="total_documento_venta" placeholder="Total" maxlength="50">
                                    </div>                                   
                                </div>    
                                <div class="pull-right col-lg-1">
                                    <label>Total</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">                                                                        
                                    <a href="{{route('salesinvoice.index')}}" class="btn btn-default pull-right">Cancelar</a>                                      
                                </div>
                            </div>
                    </div>                              
                </div>
            </div>                              
        </div>  
</section>

@endsection