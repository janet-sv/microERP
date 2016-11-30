@extends('account.homeAccount')

@section('content')


  <ol class="breadcrumb">
     <li class="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Módulo Contable</a></li>
     <li class="breadcrumb-item"><a href="{{url('Impuestos')}}">>Menu de impuestos</a></li>
     <li class="breadcrumb-item active">>Eliminar Impuesto</li>
   </ol>
 

   <div class="row">
     <div class="col-md-8">

       <div class="panel panel-default">
         <div class="panel-heading">
            Proceso de Eliminar Impuesto
          </div>
         <div class="panel-body">

              {!!Form::open(['route'=>['Impuestos.destroy',$taxes->id],'method'=>'DELETE'])!!}
                
                 <div class="form-group">
                   <label for="exampleInputPassword1">Desea eliminar este impuestos:</label>                
                 </div>
                 <div class="form-group">
                  {!!form::label('Nombre del Impuesto:')!!} 
                   {!!$taxes->name !!}
                 </div>
                 <div class="form-group">
                   {!!form::label('Tipo de IGV:')!!} 
                    {!!$taxes->tax_calculation !!}  
                 </div>

                  <div class="form-group">
                   {!!form::label('Monto del Impuesto')!!} 
                    {!!$taxes->amount !!}  
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
      document.location.href = "{{ route('Impuestos.index')}}";
  });

</script>
 @endsection 

@endsection




