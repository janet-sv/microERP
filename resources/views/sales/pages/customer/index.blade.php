@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de clientes</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
       <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Cliente</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="#" method="get">
                                    <div class="input-group">
                                        <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                        <input class="form-control" id="customer-search" name="q" placeholder="Buscar" required>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>                        
                            <div class="col-lg-6">
                                <a href="{{route('customer.create')}}">
                                    {{Form::button('<i class="fa fa-plus"></i> Crear cliente',['class'=>'btn btn-success pull-right'])}}
                                </a>
                            </div>                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
                                <thead> 
                                    <tr class="headings"> 
                                        <th>Nombre</th>                                         
                                        <th>Contribuyente</th>                                         
                                        <th>Razon social</th> 
                                        <th>RUC</th> 
                                        <th>Porcentaje descuento</th> 
                                        <th>Plazo credito</th> 
                                        <th>Línea credito</th> 
                                        <th>Monto adeudado</th> 
                                        <th colspan="2">Acciones</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    @foreach($customers as $customer)
                                    <tr> 
                                        <td>{{$customer->nombre}}</td> 
                                        @if($customer->tipo_contribuyente == 1)   
                                            <td>Natural</td> 
                                        @else
                                            <td>Jurídico</td> 
                                        @endif
                                        <td>{{$customer->razon_social}}</td> 
                                        <td>{{$customer->ruc}}</td> 
                                        <td>{{$customer->porcentaje_descuento}}</td> 
                                        <td>{{$customer->plazo_credito}}</td> 
                                        <td>{{$customer->linea_credito}}</td> 
                                        <td>{{$customer->monto_adeudado}}</td> 
                                        <td>
                                            <a href="{{route('customer.edit', $customer->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                            
                                            <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$customer->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                                            
                                        </td>
                                    </tr> 

                                    @include('sales.pages.modals.delete', ['id'=> $customer->id, 'message' => '¿Esta seguro que desea eliminar este cliente?', 'route' => route('customer.delete', $customer->id)])
                                    @endforeach
                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>

<script src="{{ URL::asset('build/js/sales/customer.js')}}"></script>

@endsection