@extends('layouts.master')

@section('title','Editar Producto')

@section('content')

  <ol class="breadcrumb">
     <li><a href="{{url('dashboard')}}">Escritorio</a></li>
     
     <li class="active">Editar Producto</li>
   </ol>
 

   <div class="row">
     <div class="col-md-8">

       <div class="panel panel-default">
         <div class="panel-heading">
            Eliminar 
          </div>
         <div class="panel-body">

         



         </div>
       </div>

     </div>
   </div>

<script>
  $("#cancelar").click(function(event)
  {
      document.location.href = "{{ route('SalesInvoice.index')}}";
  });

</script>
  

@endsection




