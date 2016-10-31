@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
   
   <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Facturas de Ventas</h1>
      </div>
       <ol class="breadcrumb">
         <li class="breadcrumb-item active" ><a href="{{url('FacturasClientes')}}">>>Modulo Contable</a></li>
       </ol>
                <!-- /.col-lg-12 -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Tabla de Facturas</strong></div>
                <div class="panel-body">
                    
                          <h2>Facturas de Clientes</h2>
                          <br>
                                <p class="navbar-text navbar-left" style=" margin-top: 1px;">
                                  <button  type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</button>
                                 </p>  <br><br><br>
                          <div class="table-responsive ">
                          <table class="table table-hover table-bordered table-responsive">
                            <thead>
                              <tr>
                                <th>
                                    <label><input type="checkbox" value=""></label>
                                </th>
                                <th>Cliente</th>
                                <th>Fecha Factura</th>
                                <th>Número</th>
                                <th>Usuario</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Total</th>
                                <th>Importe Adeuado</th>
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
@section('page-script')
<script>

  $("#nuevo").click(function(event)
  {
      document.location.href = "{{ route('FacturasClientes.create')}}";
  });

</script>

@endsection
  
@endsection
