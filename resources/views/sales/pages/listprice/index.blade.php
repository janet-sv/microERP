@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de precios de lista</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
       <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Precio de lista</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="#" method="get">
                                    <div class="input-group">
                                        <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                        <input class="form-control" id="list_price-search" name="q" placeholder="Buscar" required>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>                        
                            <div class="col-lg-6">
                                <a href="{{route('list_price.create')}}">
                                    {{Form::button('<i class="fa fa-plus"></i> Crear cliente',['class'=>'btn btn-success pull-right'])}}
                                </a>
                            </div>                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
                                <thead> 
                                    <tr class="headings"> 
                                        <th>Categoría</th>                                         
                                        <th>Producto</th>                                         
                                        <th>Precio venta</th>                                         
                                        <th colspan="2">Acciones</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    {{ -- @foreach($list_prices as $list_price)  -- }} 
                                    <tr> 
                                        <td>{{ -- $list_price->product->name -- }}</td>                                         
                                        <td>{{ -- $list_price->razon_social -- }}</td> 
                                        <td>{{ -- $list_price->ruc -- }}</td>                                         
                                        <td>
                                            <a href="{{route('list_price.edit', $list_price->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                            
                                            <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$list_price->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                                            
                                        </td>
                                    </tr> 

                                    @include('sales.pages.modals.delete', ['id'=> $list_price->id, 'message' => '¿Esta seguro que desea eliminar este cliente?', 'route' => route('list_price.delete', $list_price->id)])
                                    {{ -- @endforeach -- }}
                                     
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>

<script src="{{ URL::asset('build/js/sales/list_price.js')}}"></script>

@endsection