@extends('account.homeAccount')

@section('content')


  <ol class="breadcrumb">
      <li class ="breadcrumb-item"><a href="{{url('/ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item"><a href="{{url('/Tipo_de_documento')}}">>Tipos de documentos</a></li>
         <li class ="breadcrumb-item active">>Eliminar un tipo de documento</li>
   </ol>
 

   <div class="row">
     <div class="col-md-8">

       <div class="panel panel-default">
         <div class="panel-heading">
            Proceso de Eliminar Tipo de documento
          </div>
         <div class="panel-body">

              {!!Form::open(['route'=>['Tipo_de_documento.destroy',$document_type->id],'method'=>'DELETE'])!!}
                
                 <div class="form-group">
                   <label for="exampleInputPassword1">Desea eliminar este tipo de documento:</label>                
                 </div>

                      <div class="form-group">
                       {!!form::label('Nombre del documento:')!!} 
                        {!!$document_type->name !!}  
                     </div>
                     <div class="form-group">
                      {!!form::label('Numero de la cuenta:')!!} 
                       {!!$document_type->description !!}
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
      document.location.href = "{{ route('Tipo_de_documento.index')}}";
  });

</script>
 @endsection 

@endsection




