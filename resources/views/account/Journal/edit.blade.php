@extends('account.homeAccount')

@section('content')

  <ol class="breadcrumb">
       <li class ="breadcrumb-item"><a href="{{url('/ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item"><a href="{{url('/Tipo_Diario')}}">>Tipo de diarios</a></li>
         <li class ="breadcrumb-item active">>Editar Tipo de diario</li>
     </ol>
   <div class="page-header">
     <h1> Editar tipo de diario </h1>
   </div>

   <div class="row">
     <div class="col-md-12 col-xs-12 col-sm-12 ">

        <div class="panel panel-primary">
          <div class="panel-heading">
              Diario
           </div>
          <div class="panel-body">
                     
                {!!Form::model($journal,['route'=>['Tipo_Diario.update',$journal->id],'method'=>'PUT'])!!}

                  
              <div class="container">
                          <div class="row">
                            <div class="col-xs-12 col-sm-4 col-md-4">
                                <div class="form-group">
                                    {!!form::label('Nombre del Diario')!!}
                    {!!form::text('name',null ,['id'=>'name','class'=>'form-control','placeholder'=>'Nombre' ])!!}
                               </div>
                            </div>
                          </div>
                          <div class="row">
                              <div class="col-xs-12 col-sm-6 col-md6">
                                  <div class="form-group">
                                       {!!form::label('Descripción')!!}
  {!!form::text('description',null ,['id'=>'description','class'=>'form-control','placeholder'=>'Descripción' ])!!}
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
          document.location.href = "{{ route('Tipo_Diario.index')}}";
      });

    </script>
 


  @endsection








@endsection




