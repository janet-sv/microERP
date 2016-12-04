@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de promociones por agrupación de productos</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
       <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Promociones por agrupación de productos</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="#" method="get">
                                    <div class="input-group">
                                        <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                        <input class="form-control" id="promotionbygroup-search" name="q" placeholder="Buscar" required>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>                        
                            <div class="col-lg-6">
                                <a href="{{route('promotionbygroup.create')}}">
                                    {{Form::button('<i class="fa fa-plus"></i> Crear promoción',['class'=>'btn btn-success pull-right'])}}
                                </a>
                            </div>                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
                                <thead> 
                                    <tr class="headings"> 
                                        <th>id</th>
                                        <th>Promoción</th>                                                                                                                         
                                        <th>Producto</th>                                         
                                        <th>Cantidad</th> 
                                        <th>Porcentaje descuento</th> 
                                        <th>Fecha inicio</th> 
                                        <th>Fecha fin</th> 
                                        <th colspan="2">Acciones</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    @foreach($promotionbygroups as $key => $promotionbygroup)                                    
                                    <tr> 
                                        <td>{{ $promotionbygroup->id_promocion }}</td>                                                                                 
                                        <td>{{ $promotionbygroup->nombre }}</td>                                                                                 
                                        <td>{{ $promotionbygroup->name }}</td>                                         
                                        <td>{{ $promotionbygroup->cantidad_descuento}}</td>
                                        <td>{{ $promotionbygroup->porcentaje_descuento}}</td>
                                        <td>{{ $promotionbygroup->fecha_inicio }}</td>
                                        <td>{{ $promotionbygroup->fecha_fin }}</td> 
                                        <td>
                                            <a href="{{route('promotionbygroup.edit', $promotionbygroup->id_promocion)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                            
                                            <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$promotionbygroup->id_promocion}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                                            
                                        </td>
                                    </tr> 

                                    @include('sales.pages.modals.delete', ['id'=> $promotionbygroup->id_promocion, 'message' => '¿Está seguro que desea eliminar esta promoción?', 'route' => route('promotionbygroup.delete', $promotionbygroup->id_promocion)])
                                    @endforeach
                                </tbody> 
                            </table>
                        </div>
                        {{ $promotionbygroups->links() }}
                    </div>
                </div>
            </div>
        </div>

</section>

<script src="{{ URL::asset('build/js/sales/promotion.js')}}"></script>

@endsection