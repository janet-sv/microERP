@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">	
		<div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de condiciones de promoción</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
       <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Condiciones de promoción</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-6">
                                <form action="#" method="get">
                                    <div class="input-group">
                                        <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                        <input class="form-control" id="promocondition-search" name="q" placeholder="Buscar" required>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                           
                            <div class="col-md-6">
                                <a href="{{route('promocondition.create')}}">
                                    {{Form::button('<i class="fa fa-plus"></i> Crear Condición',['class'=>'btn btn-success pull-right'])}}
                                </a>
                            </div>
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
                                <thead> 
                                    <tr class="headings"> 
                                        <th>Nombre</th>                                         
                                        <th>Cantidad requerida</th> 
                                        <th>Cantidad descuento</th> 
                                        <th>Porcentaje descuento</th> 
                                        <th colspan="2">Acciones</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    @foreach($promoconditions as $promocondition)
                                    <tr> 
                                        <td>{{$promocondition->nombre}}</td> 
                                        <td>{{$promocondition->cantidad_requerida}}</td> 
                                        <td>{{$promocondition->cantidad_descuento}}</td> 
                                        <td>{{$promocondition->porcentaje_descuento}}</td> 
                                        <td>
                                            <a href="{{route('promocondition.edit', $promocondition->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                            
                                            <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$promocondition->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                                            
                                        </td>
                                    </tr> 

                                    @include('sales.pages.modals.delete', ['id'=> $promocondition->id, 'message' => '¿Esta seguro que desea eliminar esta promocondition?', 'route' => route('promocondition.delete', $promocondition->id)])
                                    @endforeach
                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</section>

<script src="{{ URL::asset('build/js/sales/promocondition.js')}}"></script>

@endsection