@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">
                    <div class="row">
                        <h1 class="text-center"><strong>Bienvenidos al Proyecto MICROERP</strong></h1>
                    </div>
                    <div class="row">
                        <div class="col-md-8 ">
                          <img src="img/Logo.png" class="img-responsive" alt="Image">
                        </div>
                         <div class="col-md-2 ">
                            <div class="btn-group-vertical" role="group" aria-label="...">
                                <div class="btn-group">
                                      <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action <span class="caret"></span>
                                      </button>
                                      <ul class="dropdown-menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                      </ul>
                                </div>
                            </div>
                        </div>    
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
