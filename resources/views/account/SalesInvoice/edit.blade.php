@extends('account.homeAccount')

@section('content')

   <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Modulo Contable</a></li>
     <li class="breadcrumb-item"><a href="{{url('FacturasClientes')}}">>Menu de Ventas</a></li>
     <li class="breadcrumb-item active">>Editar Factura</li>
   </ol>

   <div class="page-header">
     <h1> Editar Factura </h1>
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
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                       
                                    {!!form::label('Numero de Factura')!!}
                                    {!!form::text('number',null,['id'=>'number','class'=>'form-control','placeholder'=>'Numero de Factura' ,'readonly' => 'true'])!!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                  <div class="form-group">
                       
                                      {!!form::label('Estado')!!}
                                      {!!form::text('state',"Abierto",['id'=>'state','class'=>'form-control','placeholder'=>'Estado','readonly' => 'true'])!!}
                                    

                                 </div>
                            </div>

                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                  <div class="form-group">
                                      {!!form::label('Cliente')!!}
                                       {!! Form::select('partner_id',$Partners,null,['id'=>'partner_id','class'=>'form-control'],['readonly']) !!}
                                    
                                 </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                       <div class="form-group">
                                            {!!form::label('Fecha de emisión')!!}
                                            {!!form::text('date_invoice',null,['id'=>'date_invoice','class'=>'form-control','placeholder'=>'Seleccione la Fecha'])!!}
                                       </div>
                            </div>

                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                   <div class="form-group">
                               
                                      {!!form::label('Fecha de Vencimiento')!!}
                                      {!!form::text('date_due',null,['id'=>'date_due','class'=>'form-control','placeholder'=>'Seleccione la fecha'])!!}
                                 </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                
                            </div>

                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                 <div class="form-group">
                       
                                        {!!form::label('Usuario')!!}
                                        {!! Form::select('user_id',$users,null,['id'=>'user_id','class'=>'form-control']) !!}
                                   </div>
                                  
                            </div>

                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                 <div class="form-group">
                       
                                        {!!form::label('Usuario')!!}
                                        {!! Form::select('user_id',$users,null,['id'=>'user_id','class'=>'form-control']) !!}
                                   </div>
                                  
                            </div>
                            

                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                 <div class="form-group">
                       
                                      {!!form::label('Total Facturado')!!}
                                      {!!form::text('amount_total_signed',null,['id'=>'amount_total_signed','class'=>'form-control','placeholder'=>'Monto Total'])!!}
                                 </div>
                                  
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                  <div class="form-group">
                       
                                      {!!form::label('Importe Adeudado')!!}
                                      {!!form::text('residual_signed',null,['id'=>'residual_signed','class'=>'form-control','placeholder'=>'Importe Adeudado'])!!}
                                 </div>
                                  
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                 
                                  
                            </div>
                          </div>
             
                             {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}
                             
                           
                               <a href="#" class="btn btn-success" role="button">Registrar Pago</a>

                             <button type="button" id='cancelar'  name='cancelar' class="btn btn-danger btn-sm m-t-10" >Volver</button>  

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

  @endsection



@endsection