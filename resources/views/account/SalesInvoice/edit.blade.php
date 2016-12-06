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
                                              <th>Importe</th>
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
             
                            
                           
                               <a href="#" class="btn btn-success" role="button">Registrar Pago</a>

   <a href="/FacturasClientes" class="btn btn-danger" role="button">Volver</a>
                            

                        </div>

                   {!!Form::close()!!}
              </div>
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
   
       $("#document_id").change(event => {
       $.get(`/FacturasClientes/encuentra/${event.target.value}`, function(res, sta){
          // alert(res);
          document.getElementById("number").value = res
        
          
       });
    }); 




</script>

  @endsection



@endsection