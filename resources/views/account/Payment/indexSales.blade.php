@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
    <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('/ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item active">>Pagos de Ventas</a></li>
       </ol>
   <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Pagos de ventas</h1>
      </div>
                <!-- /.col-lg-12 -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Pagos realizados en ventas</strong></div>
                <div class="panel-body">
                    
                          <h2>Pagos realizados en ventas</h2>
                          <br>
                                <p class="navbar-text navbar-left" style=" margin-top: 1px;">
                                  <button  type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo </button>
                                 </p>  <br><br><br>
                          <div class="table-responsive ">
                          <table class="table table-hover table-bordered table-responsive">
                            <thead>
                              <tr>
                                <th>Fecha de Pago</th>
                                <th>Número de Pago</th>
                                <th>Metodo de Pago</th>
                                <th>Tipo de Pago</th>
                                <th>Cliente</th>
                                <th>Cantidadad</th>
                                <th>Referencia</th>
                                <th>Estado</th>
                              </tr>
                            </thead>

                            <tbody>
                                 @foreach($payments as $payment)
                              <tr>
                               
                                <td>{{$payment->date}}</td>
                                <td>{{$payment->number}}</td>
                                <td>{{$payment->method}}</td>
                                <td>{{$payment->type}}</td>
                                <td>{{$payment->client}}</td>
                                <td>{{$payment->amount}}</td>
                                <td>{{$payment->reference}}</td>
                                <td>{{$payment->state}}</td>

                              </tr>
                               @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                             {!!$payments->links()!!}
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
      document.location.href = "{{ route('Pago.createSales')}}";
  });

</script>

@endsection
  
@endsection
