@extends('layouts.master')

@section('title','Editar Producto')

@section('content')



   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Editar Producto
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




