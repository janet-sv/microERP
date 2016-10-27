@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
   
   <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Facturas de Cliente</h1>
      </div>
                <!-- /.col-lg-12 -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Tabla de Facturas</strong></div>
                <br>
                <br>
                <div ><button type="button" id='nuevo'  name='nuevo' class="btn btn-warning">Nuevo</button></div>
                
                      
                <div class="panel-body">
                    
                          <h2>Lista de Facturas</h2>
                          <br>
                          <div class="table-responsive ">
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>
                                    <label><input type="checkbox" value=""></label>
                                </th>
                                <th>Cliente</th>
                                <th>Fecha Factura</th>
                                <th>Número</th>
                                <th>Comercial</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Total</th>
                                <th>Importe Adecuado</th>
                                <th>Estado</th>
                                <th>Acción</th>
                              </tr>
                            </thead>
                            <tbody>
                            @foreach($SalesInvoice as $salesinvoice)
                              <tr>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                                <td>{{$salesinvoice->client}}</td>
                                <td>{{$salesinvoice->date_invoice}}</td>
                                <td>{{$salesinvoice->number}}</td>
                                <td>{{$salesinvoice->user}}</td>
                                <td>{{$salesinvoice->date_due}}</td>
                                <td>{{$salesinvoice->amount_total_signed}}</td>
                                <td>{{$salesinvoice->residual_signed}}</td>
                                <td>{{$salesinvoice->state}}</td>
                                <td>
                                    <a href="{{route('FacturasClientes.edit',$salesinvoice->id)}}">[Editar]</a> 
                                    <a href="{{route('FacturasClientes.show',$salesinvoice->id)}}">[Eliminar]</a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          </div>
                     

                </div>
            </div>
        </div>
    </div>
</div>

<script>
  $("#nuevo").click(function(event)
  {
      document.location.href = "{{ route('FacturasClientes.create')}}";
  });

</script>
  
@endsection
