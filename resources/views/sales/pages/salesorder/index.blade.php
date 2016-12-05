@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de pedidos de venta</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
       <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Pedidos de venta</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="#" method="get">
                                    <div class="input-group">
                                        <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                        <input class="form-control" id="salesorder-search" name="q" placeholder="Buscar" required>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>                        
                            <div class="col-lg-6">
                                <a href="{{route('salesorder.create')}}">
                                    {{Form::button('<i class="fa fa-plus"></i> Crear pedido de venta',['class'=>'btn btn-success pull-right'])}}
                                </a>
                            </div>                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
                                <thead> 
                                    <tr class="headings"> 
                                        <th>Numeración</th>
                                        <th>Cliente</th>                                                                                                                                                                 
                                        <th>Total</th> 
                                        <th>Fecha creación</th>                                         
                                        <th>Estado</th> 
                                        <th colspan="3">Acciones</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    @foreach($salesorders as $key => $salesorder)                                    
                                    <tr> 
                                        <td>{{ $salesorder->numeracion }}</td>                                                                                 
                                        @if($salesorder->customer)
                                            @if( $salesorder->customer->tipo_contribuyente == 1 ) 
                                                <td>{{ $salesorder->customer->nombre }}</td>                                                                                 
                                            @else
                                                <td>{{ $salesorder->customer->razon_social }}</td>                                                                                 
                                            @endif
                                        @else
                                            <td>-</td>
                                        @endif
                                        <td>{{ round($salesorder->total,1) }}</td>                                         
                                        <td>{{ $salesorder->fecha_creacion }}</td>                                        
                                        @if ( $salesorder->estado == 1)
                                            <td>Pendiente</td>
                                        @else
                                            <td>Atendido</td>
                                        @endif
                                        <td>
                                            <a href="{{route('salesorder.edit', $salesorder->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>

                                            <a href="{{route('salesinvoice.createFromSalesorder', $salesorder->id)}}" class="btn btn-primary btn-xs" title="Convertir en documento de venta"><i class="fa fa-list-alt"></i></a>
                                            
                                            <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$salesorder->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                                            
                                        </td>
                                    </tr> 

                                    @include('sales.pages.modals.delete', ['id'=> $salesorder->id, 'message' => '¿Está seguro que desea eliminar este pedido de venta?', 'route' => route('salesorder.delete', $salesorder->id)])
                                    @endforeach
                                </tbody> 
                            </table>
                        </div>
                        {{ $salesorders->links() }}
                    </div>
                </div>
            </div>
        </div>

</section>

<script src="{{ URL::asset('build/js/sales/salesorder.js')}}"></script>

@endsection