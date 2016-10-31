@extends('account.homeAccount')

@section('content')


   <div class="page-header">
     <h1> Nueva Factura </h1>
   </div>

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-primary">
          <div class="panel-heading">
              Factura de Venta
           </div>
          <div class="panel-body">
               
                 {!!Form::open(['route'=>'FacturasClientes.store','method'=>'POST'])!!}
                    
                     <div class="form-group">
                          {!!form::label('Cliente')!!}
                           {!! Form::select('partner_id',$Partners,null,['id'=>'partner_id','class'=>'form-control'],['readonly']) !!}
                        
                     </div>
                     <div class="form-group">
                   
                          {!!form::label('Fecha de Factura')!!}
                          {!!form::text('date_invoice',null,['id'=>'date_invoice','class'=>'form-control','placeholder'=>'Seleccione la Fecha'])!!}
                     </div>
                     <div class="form-group">
                   
                          {!!form::label('Numero de Factura')!!}
                          {!!form::text('number',null,['id'=>'number','class'=>'form-control','placeholder'=>'Numero de Factura'])!!}
                     </div>
                     <div class="form-group">
                   
                          {!!form::label('Usuario')!!}
                          {!! Form::select('user_id',$users,null,['id'=>'user_id','class'=>'form-control']) !!}
                     </div>
                     <div class="form-group">
                   
                          {!!form::label('Fecha de Vencimiento')!!}
                          {!!form::text('date_due',null,['id'=>'date_due','class'=>'form-control','placeholder'=>'Seleccione la fecha'])!!}
                     </div>
                     <div class="form-group">
                   
                          {!!form::label('Total Facturado')!!}
                          {!!form::text('amount_total_signed',null,['id'=>'amount_total_signed','class'=>'form-control','placeholder'=>'Monto Total'])!!}
                     </div>
                     <div class="form-group">
                   
                          {!!form::label('Importe Adeudado')!!}
                          {!!form::text('residual_signed',null,['id'=>'residual_signed','class'=>'form-control','placeholder'=>'Importe Adeudado'])!!}
                     </div>
                     <div class="form-group">
                   
                          {!!form::label('Estado')!!}
                          {!!form::text('state',null,['id'=>'state','class'=>'form-control','placeholder'=>'Estado'])!!}
                     </div>
                     
                         {!!form::submit('Grabar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Grabar</span>','class'=>'btn btn-warning btn-sm m-t-10'])!!}
                      <button type="button" id='cancelar'  name='cancelar' class="btn btn-info btn-sm m-t-10" >Cancelar</button>             
               
               {!!Form::close()!!}

              
              



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
  @endsection

@endsection




