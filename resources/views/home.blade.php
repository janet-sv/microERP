@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-primary">
                <div class="panel-heading">MICROERP - MODULOS</div>

                <div class="panel-body">
                    <h3 class="text-center"><strong>Lista de Modulos </strong></h3> <br><br>
                      <div class="col-md-2 col-md-offset-3 ">
                      <a href="/ModuloContable" class="">
                      
                      <img src="img/contabilidad.png" class="img-responsive" alt="Image">
                      <div class="caption">Contabilidad</div>
                      </a>
                      </div>
                      <div class="col-md-2 ">
                      <a href="/ventas" class="">
                      
                      <img src="img/ventas.png" class="img-responsive" alt="Image">
                      <div class="caption">Ventas</div>
                      </a>
                      </div>
                      <div class="col-md-2 ">
                      <a href="/logistica" class="">
                      
                      <img src="img/logistica.png" class="img-responsive" alt="Image">
                      <div class="caption">Logística</div>
                      </a>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
