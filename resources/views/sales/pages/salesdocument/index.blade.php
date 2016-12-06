@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">  
  <div class="row">
      <div class="col-lg-12">
          <h1 class="page-header">Lista de documentos de venta</h1>
      </div>        
  </div>
  
  <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Documentos de venta</h3>
            </div>
            <div class="panel-body">
              <div class="panel-heading"><strong>Tabla de Facturas</strong></div>
                  <div class="panel-body">                                          
                      <div class="table-responsive ">
                        <table class="table table-list-search table-striped responsive-utilities jambo_table bulk_action"> 
                          <thead>
                            <tr>
                              <th>Documento</th>
                              <th>Cliente</th>
                              <th>RUC</th>
                              <th>Fecha de emisión</th>
                              <th>Número</th>
                              <th>Usuario</th>
                              <th>Fecha de Vencimiento</th>
                              <th>Referencia</th>
                              <th>Total</th>
                              <th>Importe Adeuado</th>
                              <th>Estado</th>  
                              <th colspan="1">Acciones</th>                          
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($SalesInvoice as $salesinvoice)
                            <tr class="rows">                           
                              <td>{{$salesinvoice->document}}</td>
                              <td>{{$salesinvoice->client}}</td>
                              <td>{{$salesinvoice->ruc}}</td>
                              <td>{{$salesinvoice->date_invoice}}</td>
                              <td>{{$salesinvoice->number}}</td>
                              <td>{{$salesinvoice->user}}</td>
                              <td>{{$salesinvoice->date_due}}</td>
                              <td>{{$salesinvoice->reference}}</td>
                              <td>{{$salesinvoice->amount_total_signed}}</td>
                              <td>{{$salesinvoice->residual_signed}}</td>
                              <td>{{$salesinvoice->state}}</td>
                              <td>
                                  <a href="{{route('salesinvoice.show', $salesinvoice->id)}}" class="btn btn-primary btn-xs" title="Mostrar"><i class="fa fa-eye"></i></a>                                  
                              </td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                        <div class="text-center">
                          {!!$SalesInvoice->links()!!}
                        </div>
                      </div>
                </div>
            </div>
        </div>
      </div>
  </div>
</section>
  
@endsection
