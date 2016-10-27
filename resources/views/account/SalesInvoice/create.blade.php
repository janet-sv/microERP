@extends('layouts.master')

@section('title','Producto Nuevo')

@section('content')

<ol class="breadcrumb">
     <li><a href="{{url('dashboard')}}">Escritorio</a></li>
     <li><a href="{{url('product')}}"> Productos</a></li>
     <li class="active">Nuevo Producto</li>
   </ol>
 

   <div class="page-header">
     <h1>Producto Nuevo </h1>
   </div>

   <div class="row">
     <div class="col-md-8">

        <div class="panel panel-default">
          <div class="panel-heading">
             Nuevo Producto
           </div>
          <div class="panel-body">





           </div>
        </div>


     </div>
   </div>

<script>
  $("#cancelar").click(function(event)
  {
      document.location.href = "{{ route('product.index')}}";
  });

</script>
  

@endsection




