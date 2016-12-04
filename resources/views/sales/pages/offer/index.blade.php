@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lista de proformas</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
       <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Proformas</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form action="#" method="get">
                                    <div class="input-group">
                                        <!-- USE TWITTER TYPEAHEAD JSON WITH API TO SEARCH -->
                                        <input class="form-control" id="offer-search" name="q" placeholder="Buscar" required>
                                        <span class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>                        
                            <div class="col-lg-6">
                                <a href="{{route('offer.create')}}">
                                    {{Form::button('<i class="fa fa-plus"></i> Crear proforma',['class'=>'btn btn-success pull-right'])}}
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
                                        <th>Fecha inicio</th> 
                                        <th>Fecha fin</th> 
                                        <th>Estado</th> 
                                        <th colspan="4">Acciones</th>
                                    </tr> 
                                </thead> 
                                <tbody> 
                                    @foreach($offers as $key => $offer)                                    
                                    <tr> 
                                        <td>{{ $offer->numeracion }}</td>                                                                                 
                                        @if($offer->customer)
                                            @if( $offer->customer->tipo_contribuyente == 1 ) 
                                                <td>{{ $offer->customer->nombre }}</td>                                                                                 
                                            @else
                                                <td>{{ $offer->customer->razon_social }}</td>                                                                                 
                                            @endif
                                        @else
                                            <td>-</td>
                                        @endif
                                        <td>{{ round($offer->total,1) }}</td>                                         
                                        <td>{{ $offer->fecha_inicio }}</td>
                                        <td>{{ $offer->fecha_fin }}</td> 
                                        @if ( $offer->estado == 1)
                                            <td>Vigente</td>
                                        @else
                                            <td>Vencida</td>
                                        @endif
                                        <td>
                                            <a href="{{route('offer.edit', $offer->id)}}" class="btn btn-primary btn-xs" title="Editar"><i class="fa fa-pencil"></i></a>
                                            
                                            <a href="" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#{{$offer->id}}" title="Eliminar"><i class="fa fa-remove"></i></a>
                                            
                                            <a href="{{route('offer.copy', $offer->id)}}" class="btn btn-primary btn-xs" title="Copiar">
                                                <i class="fa fa-copy"></i>
                                            </a> 
                                            
                                            @if( $offer->estado == 1) 
                                                <a href="{{route('salesorder.createFromOffer', $offer->id)}}" class="btn btn-primary btn-xs" title="Convertir">
                                                    <i class="fa fa-hand-o-right"></i>
                                                </a> 
                                            @endif
                                            
                                        </td>
                                    </tr> 

                                    @include('sales.pages.modals.delete', ['id'=> $offer->id, 'message' => '¿Está seguro que desea eliminar esta proforma?', 'route' => route('offer.delete', $offer->id)])
                                    @endforeach
                                </tbody> 
                            </table>
                        </div>
                        {{ $offers->links() }}
                    </div>
                </div>
            </div>
        </div>

</section>

<script src="{{ URL::asset('build/js/sales/offer.js')}}"></script>

@endsection