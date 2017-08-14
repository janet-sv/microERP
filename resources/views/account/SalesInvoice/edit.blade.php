@extends('account.homeAccount')

@section('content')

   <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="{{url('/ModuloContable')}}">>Módulo Contable</a></li>
     <li class="breadcrumb-item"><a href="{{url('/FacturasClientes')}}">>Menu de Ventas</a></li>
     <li class="breadcrumb-item active">>Editar Factura</li>
   </ol>

   <div class="page-header">
     <h1> Detalle Factura </h1>
   </div>

   <div class="row">
     <div class="col-md-12 col-xs-12 col-sm-12 ">

        <div class="panel panel-primary">
          <div class="panel-heading">
              Factura de Venta
           </div>

          <div class="panel-body">
                 {!!Form::model($SalesInvoices,['route'=>['FacturasClientes.update',$SalesInvoices->id],'method'=>'PUT'])!!}


                        <div class="container">
                         <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    {!!form::label('Tipo de documento')!!}
                                       {!! Form::select('document_id',$Document_type,null,['id'=>'document_id','class'=>'form-control' ,'readonly' => 'true'],['readonly']) !!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">

                                    {!!form::label('Numero de Factura')!!}
                                    {!!form::text('number',null,['id'=>'number','class'=>'form-control','placeholder'=>'Numero de Factura' ,'readonly' => 'true'])!!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                 <div class="form-group">

                                        {!!form::label('Referencia')!!}
                                       {!!form::text('reference',null,['id'=>'reference','class'=>'form-control','readonly' => 'true'])!!}
                                   </div>

                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                  <div class="form-group">
                                      {!!form::label('Cliente')!!}
                                       {!! Form::select('partner_id',$Partners,null,['id'=>'partner_id','class'=>'form-control','readonly' => 'true'],['readonly']) !!}

                                 </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                  <div class="form-group">

                                      {!!form::label('Estado')!!}
                                     {!! Form::select('state_id',$state,null,['id'=>'state','class'=>'form-control','readonly' => 'true']) !!}

                                 </div>
                            </div>
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                 <div class="form-group">

                                        {!!form::label('Usuario')!!}
                                        {!! Form::select('user_id',$users,null,['id'=>'user_id','class'=>'form-control','readonly' => 'true']) !!}
                                   </div>

                            </div>

                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                   <div class="form-group">

                                      {!!form::label('Fecha de Vencimiento')!!}
                                      {!!form::text('date_due',null,['id'=>'date_due','class'=>'form-control','placeholder'=>'Seleccione la fecha','readonly' => 'true'])!!}
                                 </div>
                            </div>
                             <div class="col-xs-12 col-sm-6 col-md-6">
                                       <div class="form-group">
                                            {!!form::label('Fecha de emisión')!!}
                                            {!!form::text('date_invoice',null,['id'=>'date_invoice','class'=>'form-control','placeholder'=>'Seleccione la Fecha','readonly' => 'true'])!!}
                                       </div>
                            </div>

                          </div>

                          <div class="row col-xs-12 col-sm-12 col-md-12">

                              <div class="panel panel-primary ">
                                <div class="panel-heading">Panel with panel-primary class</div>
                                <div class="panel-body">

                                     <table class="table table-hover">
                                          <thead>
                                            <tr>
                                              <th>Item</th>
                                              <th>Cuenta</th>
                                              <th>Cantidad</th>
                                              <th>Precio Unitario</th>
                                              <th>Importe Cobrado</th>
                                            </tr>
                                          </thead>
                                           <tbody>
                                              @foreach($details as $detail)
                                                <tr>
                                                  <td>{{$detail->product->name}}</td>
                                             <td><strong>{{$detail->account->name}}</strong></td>
                                                  <td>{{$detail->amount}}</td>
                                                  <td>{{$detail->unitprice}}</td>
                                                  <td>{{$detail->total}}</td>
                                                </tr>
                                              @endforeach
                                            </tbody>
                                    </table>
                                     <div class="text-center">
                                         {!!$details->links()!!}
                                     </div>


                                </div>
                              </div>

                          </div>


                          <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                 <div class="form-group">

                                      {!!form::label('Total Facturado')!!}
                                      {!!form::text('amount_total_signed',null,['id'=>'amount_total_signed','class'=>'form-control','placeholder'=>'Monto Total','readonly' => 'true'])!!}
                                 </div>

                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                  <div class="form-group">

                                      {!!form::label('Importe Adeudado')!!}
                                      {!!form::text('residual_signed',null,['id'=>'residual_signed','class'=>'form-control','placeholder'=>'Importe Adeudado','readonly' => 'true'])!!}
                                 </div>

                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">


                            </div>
                          </div>


<button type="button" class="btn btn-warning"  id="cancelarpago" data-toggle="modal" data-target="#modalnotacredito">Cancelar Pago</button>
<button type="button" class="btn btn-primary"  id="pago" data-toggle="modal" data-target=".bs-example-modal-lg">Registrar Pago</button>

   <a href="/FacturasClientes" class="btn btn-danger" role="button">Volver</a>


                        </div>

                   {!!Form::close()!!}
              </div>
           </div>
          </div>
        </div>

<!-- Modals -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
        </button>
           <ol class="breadcrumb">
             <li class ="breadcrumb-item"><a href="{{url('/ModuloContable')}}">>Módulo Contable</a></li>
             <li class ="breadcrumb-item active">>Modulo de Pagos</a></li>
           </ol>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">



            {!! Form::open(array('url' => 'Pagos/storeventas/'.$SalesInvoices->id, 'method' => 'post'))   !!}

            <div class="container">

                          <div class="row">
                              <div class="col-xs-12 col-sm-3 col-md-3">
                                  <div class="form-group">
                                      {!!form::label('Tipo de Pago')!!}

                                      {!! Form::select('type',$tipo,null,['id'=>'type','class'=>'form-control'] ) !!}
                                 </div>
                              </div>
                              <div class="col-xs-12 col-sm-3 col-md-3">
                                  <div class="form-group">
                                      {!!form::label('Metodo de Pago')!!}
                                      {!! Form::select('method',$metodo,null,['id'=>'method','class'=>'form-control'] ) !!}

                                  </div>
                              </div>
                              <div class="col-xs-12 col-sm-3 col-md-3">
                                  <div class="form-group">
                                      {!!form::label('Número de Pago')!!}
                                      {!!form::text('number',null ,['id'=>'number1','class'=>'form-control' ,'readonly' => 'true'])!!}
                                 </div>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-xs-12 col-sm-3 col-md-3">
                                  <div class="form-group">
                                      {!!form::label('Fecha de Pago')!!}
                                     {!!form::text('date',null ,['id'=>'datemodal','class'=>'form-control','placeholder'=>'Seleccione Fecha' ])!!}
                                 </div>
                              </div>
                              <div class="col-xs-12 col-sm-3 col-md-3">
                                  <div class="form-group">
                                      {!!form::label('Cliente')!!}
                                      {!! Form::select('client',$Partners,null,['id'=>'client','class'=>'form-control']) !!}
                                  </div>
                              </div>
                              <div class="col-xs-12 col-sm-3 col-md-3">
                                  <div class="form-group">
                                      {!!form::label('Cantidad')!!}
                                         {!!form::text('amount',null ,['id'=>'amount','class'=>'form-control','placeholder'=>'En soles' ])!!}
                                 </div>
                              </div>

                         </div>
                         <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    {!!form::label('Referencia')!!}
                                    {!!form::text('reference',null ,['id'=>'reference','placeholder'=>'Agregue alguna referencia','class'=>'form-control'])!!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    {!!form::label('Estado')!!}
                                    {!!form::text('state','Abierto' ,['id'=>'state','class'=>'form-control','placeholder'=>'Nombre' ,'readonly' => 'true'])!!}
                               </div>
                            </div>
                          </div>
                 </div>
            </div>

      <div class="modal-footer">
         <button type="button" id='cancelar'  name='cancelar' class="btn btn-danger btn-sm m-t-10" data-dismiss="modal" >Cancelar</button>

           {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-primary'])!!}

      </div>
       {!!Form::close()!!}
    </div>
  </div>
</div>

<!-- Modal -->

    <div class="modal fade" id="modalnotacredito" role="dialog">
      <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="row">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Recibo de Rectificación</h4>

          </div>
          <div class="modal-body">

            <div class="page-header">
     <h1> Nota de Crédito </h1>
   </div>

   <div class="row">
     <div class="col-md-12 col-xs-12 col-sm-12 ">

        <div class="panel panel-primary">
          <div class="panel-heading">
              Datos de Factura
           </div>
          <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">

              <div class="panel-body ">

                   {!!Form::open(['route'=>'FacturasClientes.store','method'=>'POST'])!!}


                        <div class="container">
                         <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">

                                  {!!form::label('Tipo de documento')!!}
                                  {!! Form::select('document_id',$Document_type,null,['id'=>'document_idnc','class'=>'form-control']) !!}

                                </div>
                            </div>

                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">

                                <div id="numero"></div>

                                  <div class="form-group">
                                      {!!form::label('Numero de Factura')!!}
                                      {!!form::text('number',null,['id'=>'numbernc','class'=>'form-control','readonly' => 'true'])!!}
                                  </div>


                            </div>
                        </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                     {!!form::label('Referencia')!!}
                                       {!!form::text('reference',null,['id'=>'referencenc','class'=>'form-control'])!!}
                               </div>
                            </div>

                          </div>
                          <div class="row">

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                  <div class="form-group">

                                      {!!form::label('Estado')!!}
                                     {!! Form::select('state',$state,null,['id'=>'statenc','class'=>'form-control']) !!}


                                 </div>
                            </div>

                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                  <div class="form-group">
                                      {!!form::label('Cliente')!!}
                                      {!! Form::select('client',$Partners,null,['id'=>'clientnc','class'=>'form-control']) !!}

                                 </div>
                            </div>


                          </div>
                          <div class="row">
                           <div class="col-xs-12 col-sm-6 col-md-6">
                                       <div class="form-group">
                                            {!!form::label('Fecha de emisión')!!}
                                            {!!form::text('date_invoice',null,['id'=>'date_invoicenc','class'=>'form-control','placeholder'=>'Seleccione la Fecha'])!!}
                                       </div>
                            </div>



                          </div>
                          <div class="row">

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                   <div class="form-group">

                                      {!!form::label('Fecha de Vencimiento')!!}
                                      {!!form::text('date_due',null,['id'=>'date_duenc','class'=>'form-control','placeholder'=>'Seleccione la fecha'])!!}
                                 </div>
                            </div>


                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                 <div class="form-group">

                                        {!!form::label('Usuario')!!}
                                        {!! Form::select('user_id',$users,null,['id'=>'user_idnc','class'=>'form-control']) !!}
                                   </div>

                            </div>


                          </div>
                           <div class="row">

                            <div class="col-xs-12 col-sm-6 col-md-6">
                                 <div class="form-group">

                                        {!!form::label('Motivo')!!}
                                       {!!form::textarea('description',null,['id'=>'description','class'=>'form-control','placeholder'=>'Por anulacion total o parcial de ...'])!!}
                                   </div>

                            </div>

                          </div>


                          <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                 <div class="form-group">

                                      {!!form::label('Monto de Rectificacion')!!}
                                      {!!form::text('amount_total_signed',null,['id'=>'amount_total_signednc','class'=>'form-control','placeholder'=>'Monto Total'])!!}
                                 </div>

                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                  <div class="form-group">

                                      {!!form::label('Importe Adeudado')!!}
                                      {!!form::text('residual_signed',null,['id'=>'residual_signednc','class'=>'form-control','placeholder'=>'Importe Adeudado'])!!}
                                 </div>

                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">


                            </div>
                          </div>

                             {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}

                             <button type="button" id='cancelar'  name='cancelar' class="btn btn-info btn-sm m-t-10" >Cancelar</button>

                        </div>

                   {!!Form::close()!!}
              </div>
           </div>
          </div>
        </div>


     </div>
   </div>




          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        </div>

      </div>
    </div>

@section('page-script')
    <script>
      $("#cancelar").click(function(event)
      {
          document.location.href = "{{ route('FacturasClientes.index')}}";
      });


      $(#grabar).hide();
    </script>


  <script>
  $( function() {
    $( "#date_invoice" ).datepicker({ dateFormat: "yy-mm-dd" });
  } );
  </script>
<script>
  $( function() {
    $( "#date_due" ).datepicker({ dateFormat: "yy-mm-dd" });
  } );
  </script>
<script>
  $( function() {
    $( "#datemodal" ).datepicker({ dateFormat: "yy-mm-dd", minDate: 0 }).datepicker("setDate", new Date());


  } );
  </script>

  <script>

       $("#method").change(event => {
       $.get(`/FacturasClientes/encuentra/${event.target.value}`, function(res, sta){
          // alert(res);
          document.getElementById("number1").value = res;


       });
    });
</script>
<script>

      if ( (document.getElementById("residual_signed").value > 0)) {

          $("#cancelarpago").hide();

    }
     if ( (document.getElementById("residual_signed").value <= 0)) {
          $("#pago").hide();
          $("#cancelarpago").show();

    }


</script>

<script>

     $rest = document.getElementById("residual_signed").value
     document.getElementById("amount").value = $rest
      $client = document.getElementById("partner_id").value


</script>
<script>

     $rest = document.getElementById("residual_signed").value
     document.getElementById("amount").value = $rest



</script>

<script>

    $("#cancelarpago").click(function(){
      $("#document_idnc").val("2");


       $.get(`/FacturasClientes/encuentranc/2`, function(res, sta){
          // alert(res);
          document.getElementById("numbernc").value = res;
       });
       $("#statenc").val("1");

        $rest = document.getElementById("partner_id").value

         document.getElementById("clientnc").value = $rest

        $( function() {
            $( "#date_invoicenc" ).datepicker({ dateFormat: "yy-mm-dd", minDate: 0 }).datepicker("setDate", new Date());

        } );

        $( function() {
            $( "#date_duenc" ).datepicker({ dateFormat: "yy-mm-dd", minDate: 0 }).datepicker("setDate", new Date());

        } );

        $rest = document.getElementById("user_id").value
        document.getElementById("user_idnc").value = $rest

        $rest = document.getElementById("amount_total_signed").value
        document.getElementById("amount_total_signednc").value = $rest
        $rest = document.getElementById("residual_signed").value
        document.getElementById("residual_signednc").value = $rest

        document.getElementById("referencenc").setAttribute('value',{{$SalesInvoices->id}});
    });

</script>

  @endsection



@endsection
