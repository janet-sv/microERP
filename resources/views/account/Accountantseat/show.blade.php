@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
    <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('/ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item active"><a href="{{url('/AsientosContables')}}">>Asientos Contables</a></li>
    </ol>
   
 <div class="page-header">
     <h1> Apuntes Contables </h1>
 </div>

  <div class="row">
     <div class="col-xs-12 col-sm-12 col-md-12">
       <div class="panel panel-primary">
          <div class="panel-heading">
              Datos del Asiento Contable
           </div>
          <div class="panel-body">

          {{ Form::open(array('url' => '#')) }}

              <div class="container">
                      
                    <div class="row">
                          <div class="col-xs-12 col-sm-4 col-md-4">
                              <div class="form-group">
                                  {!!form::label('Tipo de documento')!!}
                                     {!!form::text('code',$accountantseats->code,['id'=>'code','class'=>'form-control' ,'readonly' => 'true'])!!}
                             </div>
                          </div>
                          <div class="col-xs-12 col-sm-4 col-md-4">
                              <div class="form-group">
                                  {!!form::label('Numero de Factura')!!}
                                  {!!form::text('number',$accountantseats->number,['id'=>'number','class'=>'form-control' ,'readonly' => 'true'])!!}
                             </div>
                          </div>
                          <div class="col-xs-12 col-sm-4 col-md-4">
                               <div class="form-group">
                                    {!!form::label('Fecha')!!}
                                    {!!form::text('date',$accountantseats->date,['id'=>'date','class'=>'form-control','readonly' => 'true'])!!}
                               </div>
                          </div>
                    </div>
                    <div class="row">
                          <div class="col-xs-12 col-sm-4 col-md-4">
                              <div class="form-group">
                                  {!!form::label('Tipo de Diario')!!}
                                     {!!form::text('diario',$diario,['id'=>'diario','class'=>'form-control','readonly' => 'true'])!!}
                             </div>
                          </div>
                          <div class="col-xs-12 col-sm-4 col-md-4">
                              <div class="form-group">
                                  {!!form::label('Referencia')!!}
                                     {!!form::text('reference',$accountantseats->reference,['id'=>'reference','class'=>'form-control','readonly' => 'true'])!!}
                             </div>
                          </div>
                    </div>
                    
                  
                   <div class="row col-xs-12 col-sm-12 col-md-12">
                              
                              <div class="panel panel-primary ">
                                <div class="panel-heading">Apuntes Contables -Detalle</div>
                                <div class="panel-body">
                                   
                  <table class="table table-hover table-bordered table-responsive">
                      <thead>
                          <tr>
                            <th>Cuenta</th>
                            <th>Nombre de la Cuenta</th>
                            <th>Empresa</th>
                            <th>Etiqueta</th>
                            <th>Debe</th>
                            <th>Haber</th>
                          </tr>
                      </thead>
                      <tbody>
                         @foreach($details as $detail)

                              <tr>
                                <td>{{$detail->accounts->code}}</td>
                                <td>{{$detail->accounts->name}}</td>
                                <td>{{$detail->customer->razon_social}}</td>
                                <td>{{$detail->etiqueta}}</td>
                                <td>{{$detail->debe}}</td>
                                <td>{{$detail->haber}}</td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
               </div>
             </div>
           </div>

          <a href="/AsientosContables" class="btn btn-danger" role="button">Volver</a>
                  
            </div>

               {{ Form::close() }}       
          </div>
       </div>
    </div>
   </div>
@section('page-script')
<script>

  
</script>

@endsection
  
@endsection