@extends('logistic.layouts.base')

@section('title', 'Logística')

@section('content')

<section class="logistic-container">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Categoría de Producto</h1>
        </div>
    </div>
    @if(session('message'))
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            {{session('message')}}
        </div>
    @endif
    <div class="row">
    	<div class="col-sm-12">
    		<form class="form-horizontal" role="form" method="POST" action="{{ route('logistic.warehouse.update', ['id' => $category->id]) }}">
    			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			  	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			    	<label class="col-xs-12 col-sm-5 col-md-4 control-label">Nombre: </label>
			    	<div class="col-xs-12 col-sm-6 col-md-5">
			      		<input type="text" class="form-control" name="name" value="@if(old('name')){{ old('name') }}@else{{$category->name}}@endif" maxlength="50">
			      		@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
			    	</div>
			  	</div>
			  	<div class="form-group">
			    	<label class="col-xs-12 col-sm-5 col-md-4 control-label">Descripción: </label>
			    	<div class="col-xs-12 col-sm-6 col-md-5">
			      		<textarea class="form-control" name="description" rows="3">
			      		@if(old('description')) 
			      			{{ old('description') }}
			      		@else
			      			{{$category->description}} 
			      		@endif
			      		</textarea>
			    	</div>
			  	</div>
			  	<div class="form-group">
			  		<div class="col-xs-12 col-sm-11 col-md-9 text-right">
				  		<a href="{{ route('logistic.warehouse.index') }}">
				  			<button type="button" class="btn btn-default">Cancelar</button>
				  		</a>
			  			<input type="submit" class="btn btn-primary" value="Guardar" />
			  		</div>
			  	</div>
			</form>																				
        </div>
    </div>
</section>



@endsection