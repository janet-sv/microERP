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
                    
                          <h2>Facturas de Proveedores</h2>
                          <br>
                                <p class="navbar-text navbar-left" style=" margin-top: 1px;">
                                  <button  type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo</button>
                                 </p>  <br><br><br>
                          <div class="table-responsive ">
                          <table class="table table-hover table-bordered table-responsive">
                          
                              <thead>
                                <tr>
                                  <th>Proveedor</th>
                                  <th>Fecha de Factura</th>
                                  <th>Numero</th>
                                  <th>Fecha de Vencimiento</th>
                                  <th>Total</th>
                                  <th>A Pagar</th>
                                  <th>Estado</th>

                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td>Proveedor 1</td>
                                  <td>2016-04-12</td>
                                  <td>1</td>
                                  <td>2016-04-12</td>
                                  <td>1000.0</td>
                                  <td>0.0</td>
                                  <td>Cancelado</td>
                                </tr>
                                <tr>
                                  <td>Proveedor 2</td>
                                  <td>2016-08-12</td>
                                  <td>1</td>
                                  <td>2016-08-12</td>
                                  <td>456.0</td>
                                  <td>0.0</td>
                                  <td>Cancelado</td>
                                </tr>
                                <tr>
                                  <td>Proveedor 3</td>
                                  <td>2016-04-12</td>
                                  <td>1</td>
                                  <td>2016-04-12</td>
                                  <td>342.0</td>
                                  <td>0.0</td>
                                  <td>Cancelado</td>
                                </tr>
                                <tr>
                                  <td>Proveedor 4</td>
                                  <td>2016-04-12</td>
                                  <td>1</td>
                                  <td>2016-04-12</td>
                                  <td>1000.0</td>
                                  <td>0.0</td>
                                  <td>Cancelado</td>
                                </tr>
                                <tr>
                                  <td>Proveedor 1</td>
                                  <td>2016-04-12</td>
                                  <td>1</td>
                                  <td>2016-04-12</td>
                                  <td>1000.0</td>
                                  <td>0.0</td>
                                  <td>Cancelado</td>
                                </tr>
                                <tr>
                                  <td>Proveedor 1</td>
                                  <td>2016-04-12</td>
                                  <td>1</td>
                                  <td>2016-04-12</td>
                                  <td>1000.0</td>
                                  <td>0.0</td>
                                  <td>Cancelado</td>
                                </tr>
                                <tr>
                                  <td>Proveedor 1</td>
                                  <td>2016-04-12</td>
                                  <td>1</td>
                                  <td>2016-04-12</td>
                                  <td>1000.0</td>
                                  <td>0.0</td>
                                  <td>Cancelado</td>
                                </tr>
                                <tr>
                                  <td>Proveedor 1</td>
                                  <td>2016-04-12</td>
                                  <td>1</td>
                                  <td>2016-04-12</td>
                                  <td>1000.0</td>
                                  <td>0.0</td>
                                  <td>Cancelado</td>
                                </tr>

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
