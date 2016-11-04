@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
   
   <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Facturas de Compras</h1>
      </div>
       <ol class="breadcrumb">
         <li class="breadcrumb-item active" ><a href="{{url('ModuloContable')}}">>>Modulo Contable</a></li>
       </ol>
                <!-- /.col-lg-12 -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Tabla de Facturas</strong></div>
                <div class="panel-body">
                    
                          <h2>Facturas de Proveedores</h2>
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
                                    <th>Proveedor</th>
                                    <th>Fecha de Factura</th>
                                    <th>Numero</th>
                                    <th>Fecha de Vencimiento</th>
                                    <th>Total</th>
                                    <th>A Pagar</th>
                                    <th>Estado</th>
                                    <th>Acción</th>
                                </tr>
                              </thead>
                              <tbody>
                                   @foreach($PurchasesInvoice as $purchasesinvoice)
                                      <tr>
                                            <td>
                                                <label><input type="checkbox" value=""></label>
                                            </td>
                                            <td>{{$purchasesinvoice->provider}}</td>
                                            <td>{{$purchasesinvoice->date_invoice}}</td>
                                            <td>{{$purchasesinvoice->number}}</td>
                                            <td>{{$purchasesinvoice->date_due}}</td>
                                            <td>{{$purchasesinvoice->amount_total_signed}}</td>
                                            <td>{{$purchasesinvoice->residual_signed}}</td>
                                            <td>{{$purchasesinvoice->state}}</td>
                                            <td>
                                              <a href="{{route('FacturasProveedores.edit',$purchasesinvoice->id)}}">[Editar]</a> 
                                              <a href="{{route('FacturasProveedores.show',$purchasesinvoice->id)}}">[Eliminar]</a>
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