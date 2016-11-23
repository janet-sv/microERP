@extends('account.homeAccount')

@section('content')

  <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Mó
         dulo Contable</a></li>
         <li class ="breadcrumb-item"><a href="{{url('/Bancos')}}">>Bancos</a></li>
         <li class ="breadcrumb-item active">>Editar un cuenta</li>
     </ol>
   <div class="page-header">
     <h1> Editar cuenta bancaria </h1>
   </div>

   <div class="row">
     <div class="col-md-12 col-xs-12 col-sm-12 ">

        <div class="panel panel-primary">
          <div class="panel-heading">
              Bancos
           </div>
          <div class="panel-body">
                     
                  {!!Form::model($banks,['route'=>['Bancos.update',$banks->id],'method'=>'PUT'])!!}

                  
            <div class="container">
                          <div class="row">
                            <div class="col-xs-12 col-sm-8 col-md-8">
                                <div class="form-group">
                                    {!!form::label('Numero de Cuenta')!!}
                                    {!!form::text('number',null ,['id'=>'number','class'=>'form-control','placeholder'=>'Cuenta' ])!!}
                               </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-xs-12 col-sm-4 col-md4">
                                  <div class="form-group">
                                       {!!form::label('Nombre del Banco')!!}
                                       {!! Form::select('name_bank',$banco,null,['id'=>'name_bank','class'=>'form-control'] ) !!}
                                   </div>                  
                              </div> 
                          </div>
                          <div class="row">
                              <div class="col-xs-12 col-sm-6 col-md-6">
                                  <div class="form-group">
                                       {!!form::label('Métodos de débito')!!}
                                       {{ Form::checkbox('debit', 'Manual', true) }}
                                   </div>                  
                              </div> 
                               <div class="col-xs-12 col-sm-6 col-md-6">
                                  <div class="form-group">
                                       {!!form::label('Métodos de pago')!!}
                                        {{ Form::checkbox('debit', 'Manual', true) }}
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


     </div>
   </div>


@section('page-script')
    <script>
      $("#cancelar").click(function(event)
      {
          document.location.href = "{{ route('Bancos.index')}}";
      });

    </script>
 


  @endsection








@endsection




