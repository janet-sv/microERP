@extends('account.homeAccount')

@section('content')

  <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item"><a href="{{url('Impuestos')}}">>Impuestos</a></li>
         <li class ="breadcrumb-item active">>Lista de Impuestos</li>
     </ol>
   <div class="page-header">
     <h1> Editar Impuestos </h1>
   </div>

   <div class="row">
     <div class="col-md-12 col-xs-12 col-sm-12 ">

        <div class="panel panel-primary">
          <div class="panel-heading">
              Impuestos
           </div>
          <div class="panel-body">
                     
                  {!!Form::model($taxes,['route'=>['Impuestos.update',$taxes->id],'method'=>'PUT'])!!}

                  
            <div class="container">
                          <div class="row">
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                <div class="form-group">
                                    {!!form::label('Nombre del Impuesto')!!}
                                    {!!form::text('name',null ,['id'=>'name','class'=>'form-control','placeholder'=>'Nombre del Impuesto' ])!!}
                               </div>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                  <div class="form-group">
                       
                                      {!!form::label('Ambito del Impuesto')!!}
                                      {!! Form::select('scope_tax',$ambito,null,['id'=>'scope_tax','class'=>'form-control'],['readonly']) !!}
                                 </div>
                            </div>

                          </div>
                          <div class="row">
                          <div class="col-xs-12 col-sm-6 col-md-6">
                             <div class="form-group">
                                 {!!form::label('Calculo del Impuesto')!!}
                                     



                                 {!! Form::select('tax_calculation',$calculo,null,['id'=>'tax_calculation','class'=>'form-control'] ) !!}
                              </div>                  
                              </div> 
                            <div class="col-xs-12 col-sm-6 col-md-6">
                                       <div class="form-group">
                                            {!!form::label('Importe')!!}
                                            {!!form::text('amount',null,['id'=>'amount','class'=>'form-control','placeholder'=>'Importe'])!!}
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
          document.location.href = "{{ route('Impuestos.index')}}";
      });

    </script>
 


  @endsection








@endsection




