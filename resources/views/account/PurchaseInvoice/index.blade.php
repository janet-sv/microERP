@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
    <ol class="breadcrumb">
         <li class="breadcrumb-item" ><a href="{{url('ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item active"><a href="{{url('FacturasProveedores')}}">>Menu de Compras</a></li>
       </ol>
   <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Facturas de Compras</h1>
      </div>

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
                                <br>
                          <div class="table-responsive ">
                          <table class="table table-hover table-bordered table-responsive">
                            <thead>
                              <tr>
                                <th>Documento</th>
                                <th>Proveedor</th>
                                <th>RUC</th>
                                <th>Fecha de emisión</th>
                                <th>Número</th>
                                <th>Usuario</th>
                                <th>Fecha de Vencimiento</th>
                                <th>Referencia</th>
                                <th>Total</th>
                                <th>Importe Adeuado</th>
                                <th>Estado</th>

                              </tr>
                            </thead>
                            <tbody>
                            @foreach($PurchasesInvoice as $purchasesinvoice)
                              <tr class="clickable-row" data-href="{{route('FacturasClientes.edit',$purchasesinvoice->id)}}" >

                                <td>{{$purchasesinvoice->document_type->name}}</td>
                                <td>{{$purchasesinvoice->Provider->name}}</td>
                                <td>{{$purchasesinvoice->Provider->ruc}}</td>
                                <td>{{$purchasesinvoice->date_invoice}}</td>
                                <td>{{$purchasesinvoice->number}}</td>
                                <td>{{$purchasesinvoice->user->name}}</td>
                                <td>{{$purchasesinvoice->date_due}}</td>
                                <td>{{$purchasesinvoice->reference}}</td>
                                <td>{{$purchasesinvoice->amount_total_signed}}</td>
                                <td>{{$purchasesinvoice->residual_signed}}</td>
                                <td>{{$purchasesinvoice->stateinvoice->name}}</td>


                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                            {!!$purchasesinvoice->links()!!}
                          </div>

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
      document.location.href = "{{ route('FacturasProveedores.create')}}";
  });

jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.document.location = $(this).data("href");
    });
});

</script>

@endsection

@endsection
