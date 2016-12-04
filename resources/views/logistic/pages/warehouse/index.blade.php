@extends('logistic.layouts.base')

@section('title', 'Logística')

@section('content')

<section class="logistic-container">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Almacenes</h1>
        </div>
    </div>
    <div class="row">
    	<div class="col-sm-12">
    		<a href="{{ route('logistic.warehouse.create') }}">
    			<button type="button" class="btn btn-success">
    				<i class="fa fa-dashboard"></i> Nuevo
    			</button>
    		</a>
    	</div>
    </div>
    @if(session('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{session('message')}}
        </div>
    @endif
    <div class="row">
    	<div class="col-sm-12">
			<div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Nro. de secciones</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach($warehouses as $key => $warehouse)
	                        <tr>
	                            <td>{{$key + 1}}</td>
	                            <td>{{$warehouse->name}}</td>
                                <td>{{$warehouse->sections->count()}}</td>
	                            <td>
                                    <a href="{{ route('logistic.warehouse.edit', $warehouse->id) }}">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-pencil"></i></button>
                                    </a>
                                    <a href=""></a>   
                                </td>
	                        </tr>
                    	@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

