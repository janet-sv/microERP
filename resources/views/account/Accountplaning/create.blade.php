@extends('account.homeAccount')

@section('content')

  <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Modulo Contable</a></li>
         <li class ="breadcrumb-item active"><a href="{{url('PlanContable')}}">>Plan Contable General</a></li>
         <li class ="breadcrumb-item active">>Nueva Cuenta</li>
     </ol>
   <div class="page-header">
     <h1> Nueva cuenta </h1>
   </div>

   <div class="row">
     <div class="col-md-12 col-xs-12 col-sm-12 ">

        <div class="panel panel-primary">
          <div class="panel-heading">
              Cuentas
           </div>
          <div class="panel-body">
                     
                 {!!Form::open(['route'=>'PlanContable.store','method'=>'POST'])!!}
                       

            <div class="container">
                          <div class="row">
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        {!!form::label('Cuenta contable')!!}
                                       
                                   </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        {!!form::text('code',null ,['id'=>'code','class'=>'form-control'])!!}
                                       
                                   </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 col-md-3">
                                    <div class="form-group">
                                       {!!form::text('name',null ,['id'=>'name','class'=>'form-control'])!!}
                                    </div>
                                </div>
                          </div>
                          <div class="row">
                                   <div class="col-xs-12 col-sm-4 col-md4">
                                      <fieldset>
                                            <legend>Nivel de cuenta</legend>
                                                <div class="form-group">
                                               {!! Form::select('account_level',$nivel,null,['id'=>'account_level','class'=>'form-control'] ) !!}
                                                </div>    
                                        </fieldset>                         
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md4">
                                      <fieldset>
                                            <legend>Tipo de cuenta</legend>
                                                <div class="form-group">
                                               {!! Form::select('account_type',$cuenta,null,['id'=>'account_type','class'=>'form-control'] ) !!}
                                                </div>    
                                        </fieldset>                         
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md4">
                                      <fieldset>
                                            <legend>Tipo de analisis</legend>
                                                <div class="form-group">
                                               {!! Form::select('analysis_type',$analisis,null,['id'=>'analysis_type','class'=>'form-control'] ) !!}
                                                </div>    
                                        </fieldset>                         
                                    </div>
                           </div>
                          <div class="row">
                              <div class="col-xs-12 col-sm-6 col-md-6">
                                  <div class="form-group">
                                          {!!form::label('Cta. para amarre al DEBE')!!}
                                          {!!form::text('debit',null ,['id'=>'debit','class'=>'form-control'])!!}
                                   </div>                  
                              </div> 
                               <div class="col-xs-12 col-sm-6 col-md-6">
                                  <div class="form-group">
                                          {!!form::label('Cta. para amarre al HABER')!!}
                                          {!!form::text('credit',null ,['id'=>'credit','class'=>'form-control'])!!}
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
          document.location.href = "{{ route('PlanContable.index')}}";
      });

    </script>
 


  @endsection








@endsection




