@extends('account.homeAccount')

@section('content')


  <ol class="breadcrumb">
      <li class ="breadcrumb-item"><a href="{{url('/ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item"><a href="{{url('/Bancos')}}">>Bancos</a></li>
         <li class ="breadcrumb-item active">>Eliminar un cuenta</li>
   </ol>
 

   <div class="row">
     <div class="col-md-8">

       <div class="panel panel-default">
         <div class="panel-heading">
            Proceso de Eliminar Banco
          </div>
         <div class="panel-body">

              {!!Form::open(['route'=>['Bancos.destroy',$banks->id],'method'=>'DELETE'])!!}
                
                 <div class="form-group">
                   <label for="exampleInputPassword1">Desea eliminar este cuenta bancaria:</label>                
                 </div>

                      <div class="form-group">
                       {!!form::label('Nombre del Banco:')!!} 
                        {!!$banks->name_bank !!}  
                     </div>
                     <div class="form-group">
                      {!!form::label('Numero de la cuenta:')!!} 
                       {!!$banks->number !!}
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
      document.location.href = "{{ route('Bancos.index')}}";
  });

</script>
 @endsection 

@endsection




