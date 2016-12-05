@extends('account.homeAccount')

@section('content')

  <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item"><a href="{{url('FacturasProveedores')}}">>Menu de Compras</a></li>
         <li class ="breadcrumb-item active">>Nueva Factura de Compras</li>
     </ol>
   <div class="page-header">
     <h1> Nueva Factura </h1>
   </div>

   <div class="row">
     <div class="col-md-12 col-xs-12 col-sm-12 ">

        <div class="panel panel-primary">
          <div class="panel-heading">
              Factura de Compra
           </div>
          <div class="panel-body">
               
                 {!!Form::open(['route'=>'FacturasProveedores.store','method'=>'POST'])!!}
                    
                    

            <div class="container">

                         <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    {!!form::label('Tipo de documento')!!}
                                       {!! Form::select('document_id',$Document_type,null,['id'=>'document_id','class'=>'form-control'],['readonly']) !!}
                               </div>
                            </div>
                            
                          </div>
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    {!!form::label('Numero de Factura')!!}
                                    {!!form::text('number',$invoices +1 ,['id'=>'number','class'=>'form-control','placeholder'=>$invoices ,'readonly' => 'true' ])!!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                  <div class="form-group">
                       
                                      {!!form::label('Estado')!!}
                                      {!! Form::select('state',$state,null,['id'=>'state','class'=>'form-control'],['readonly']) !!}

                                 </div>
                            </div>

                          </div>
                          <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                             <div class="form-group">
                                 {!!form::label('Proveedor')!!}
                                 {!! Form::select('provider_id',$Providers,null,['id'=>'provider_id','class'=>'form-control'],['readonly']) !!}
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
                                       <div class="form-group">
                                            {!!form::label('Fecha de emisión')!!}
                                            {!!form::text('date_invoice',null,['id'=>'date_invoice','class'=>'form-control','placeholder'=>'Seleccione la Fecha'])!!}
                                       </div>
                            </div>

                          </div>
                         <div class="row">
                           
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                 <div class="form-group">
                       
                                        {!!form::label('Referencia')!!}
                                       {!!form::text('reference',null,['id'=>'reference','class'=>'form-control'])!!}
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
                             
                             <button type="button" id='cancelar'  name='cancelar' class="btn btn-info btn-sm m-t-10" >Cancelar</button>  

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
          document.location.href = "{{ route('FacturasProveedores.index')}}";
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


  <script>
          $("#document_id").change(event => {
          $.get(`/FacturasProveedores/encuentra/${event.target.value}`, function(res, sta){
          // alert(res);
          document.getElementById("number").value = res
          
          
          });
          }); 





  </script>

  @endsection








@endsection




