@extends('account.homeAccount')

@section('content')

  <ol class="breadcrumb">
       <li class ="breadcrumb-item"><a href="{{url('/ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item"><a href="{{url('/Pagos')}}">>Modulo de Pagos</a></li>
         <li class ="breadcrumb-item active">>Nuevo Pago</li>
     </ol>
   <div class="page-header">
     <h1> Registrar Pago </h1>
   </div>

   <div class="row">
     <div class="col-md-12 col-xs-12 col-sm-12 ">

        <div class="panel panel-primary">
          <div class="panel-heading">
             Pago
           </div>
          <div class="panel-body">
                     
                 {!!Form::open(['route'=>'Pagos.store','method'=>'POST'])!!}
                       

            <div class="container">
                         
                          <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    {!!form::label('Fecha de Pago')!!}
                                    {!!form::text('date',null ,['id'=>'date','class'=>'form-control','placeholder'=>'Seleccione Fecha' ])!!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    {!!form::label('Número de Pago')!!}
                                    {!!form::text('number',null ,['id'=>'number','class'=>'form-control' ])!!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    {!!form::label('Metodo de Pago')!!}

                                      {!! Form::select('method',$metodo,null,['id'=>'method','class'=>'form-control' ,'placeholder'=>'Seleccione metodo de pago' ] ) !!}                                 
                                   
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    {!!form::label('Tipo de Pago')!!}
                                      {!! Form::select('type',$tipo,null,['id'=>'type','class'=>'form-control' ,'placeholder'=>'Seleccione tipo de pago' ] ) !!}
                                   
                               </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    {!!form::label('Cliente')!!}
                                    {!! Form::select('client',$Partners,null,['id'=>'client','class'=>'form-control']) !!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    {!!form::label('Cantidadad')!!}
                                    {!!form::text('amount',null ,['id'=>'amount','class'=>'form-control','placeholder'=>'cantidad' ])!!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    {!!form::label('Referencia')!!}
                                    {!!form::text('reference',null ,['id'=>'reference','class'=>'form-control'])!!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-3 col-md-3">
                                <div class="form-group">
                                    {!!form::label('Estado')!!}
                                    {!!form::text('state','Abierto' ,['id'=>'state','class'=>'form-control','placeholder'=>'Nombre' ])!!}
                               </div>
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

@section('page-script')

    <script>
      $("#cancelar").click(function(event)
      {
          document.location.href = "{{ route('Pagos.index')}}";
      });

      $( function() {
        $( "#date" ).datepicker({ dateFormat: "yy-mm-dd" });
      } );

    </script>
 
@endsection

@endsection




