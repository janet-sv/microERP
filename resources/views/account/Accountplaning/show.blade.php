@extends('account.homeAccount')

@section('content')


   <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Modulo Contable</a></li>
         <li class ="breadcrumb-item active"><a href="{{url('PlanContable')}}">>Plan Contable General</a></li>
         <li class ="breadcrumb-item active">>Eliminar Cuenta</li>
     </ol>
 

   <div class="row">
     <div class="col-md-8">

       <div class="panel panel-default">
         <div class="panel-heading">
            Proceso de Eliminar Cuenta
          </div>
         <div class="panel-body">

              {!!Form::open(['route'=>['PlanContable.destroy',$accounts->id],'method'=>'DELETE'])!!}
                
                 <div class="form-group">
                   <label for="exampleInputPassword1">Desea eliminar este cuenta en el plan contable:</label>                
                 </div>

                      <div class="form-group">
                       {!!form::label('Código de la cuenta:')!!} 
                        {!!$accounts->code !!}  
                     </div>
                     <div class="form-group">
                       {!!form::label('Nombre de la Cuenta:')!!} 
                        {!!$accounts->name !!}  
                     </div>
                                      
                     {!!form::submit('Eliminar',['name'=>'grabar','id'=>'grabar','content'=>'<span>Eliminar</span>','class'=>'btn btn-danger btn-sm m-t-10'])!!}

            <button type="button" id= 'cancelar' name='cancelar' class="btn btn-default btn-sm m-t-10" >Cancelar</button>

              {!!Form::close()!!}

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




