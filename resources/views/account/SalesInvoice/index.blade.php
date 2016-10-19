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
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                                <td>New York</td>
                                <td>USA</td>
                                <td>USA</td>
                                <td>USA</td>
                                <td>USA</td>
                              </tr>
                              <tr>
                                <td>
                                    <label><input type="checkbox" value=""></label>
                                </td>
                                <td>Anna</td>
                                <td>Pitt</td>
                                <td>35</td>
                                <td>New York</td>
                                <td>USA</td>
                                <td>USA</td>
                                <td>USA</td>
                                <td>USA</td>
                              </tr>
                            </tbody>
                          </table>
                          </div>
                     

                </div>
            </div>
        </div>
    </div>
</div>

  
@endsection
