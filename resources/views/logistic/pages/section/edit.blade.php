@extends('logistic.layouts.base')

@section('title', 'Logística')

@section('content')

<section class="logistic-container">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Editar Sección de almacén</h1>
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
    		<form class="form-horizontal" role="form" method="POST" action="{{ route('logistic.section.update', ['id' => $section->id]) }}">
    			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			  	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
			    	<label class="col-xs-12 col-sm-5 col-md-4 control-label">Nombre: </label>
			    	<div class="col-xs-12 col-sm-6 col-md-5">
			      		<input type="text" class="form-control" name="name" value="@if(old('name')){{ old('name') }}@else{{$section->name}}@endif" maxlength="50">
			      		@if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
			    	</div>
			  	</div>

			  	<div class="form-group{{ $errors->has('warehouse') ? ' has-error' : '' }}">
			  		<label class="col-xs-12 col-sm-5 col-md-4 control-label">Almacén: </label>
			  		<div class="col-xs-12 col-sm-6 col-md-5">
				  		<select class="form-control" name="warehouse">
						  	<option>Seleccione un almacén</option>
						  	@foreach($warehouses as $warehouse)
						  	<option value="{{$warehouse->id}}" @if($section->id_warehouse == $warehouse->id)selected="selected"@endif>{{$warehouse->name}}</option>
						  	@endforeach
						</select>
			      		@if ($errors->has('warehouse'))
	                        <span class="help-block">
	                            <strong>{{ $errors->first('warehouse') }}</strong>
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
			      			{{$section->description}} 
			      		@endif
			      		</textarea>
			    	</div>
			  	</div>
			  	<div class="form-group">
			  		<div class="col-xs-12 col-sm-11 col-md-9 text-right">
				  		<a href="{{ route('logistic.section.index') }}">
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