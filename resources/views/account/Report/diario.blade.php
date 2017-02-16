@extends('account.homeAccount')
@section('content')
<br>
<br>

 <div class="row">
  <div class="col-xs-5 col-sm-5 col-md-5 col-md-5">
  <div class="panel panel-info">
     <div class="panel-heading">Reporte Contable - Diario</div>
      <div class="panel-body">
      	 {!! Form::open(['url' => '/Informes/exportdiario']) !!}

          <div class="row">
      	 	 <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-1 col-sm-offset-1">
                   {!!form::label('Fecha Inicial')!!}
                   {!!form::text('datei',null,['id'=>'datei','class'=>'form-control','placeholder'=>'Fecha Inicio'])!!}
             </div>
      	 	  <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-1 col-sm-offset-1">
                   {!!form::label('Fecha Final')!!}
                   {!!form::text('datef',null,['id'=>'datef','class'=>'form-control','placeholder'=>'Fecha Fin'])!!}
             </div>

         </div>
            <br>   
         <div class="row">
             <div class="col-xs-12 col-sm-3 col-md-3 col-md-offset-1 col-sm-offset-1">
      {!!form::submit('Exportar',['name'=>'Exportar','id'=>'exportar','content'=>'<span>Grabar</span>','class'=>'btn btn-primary btn-sm m-t-10'])!!}   </div>

         </div>
         {!! Form::close() !!}
      </div>
   </div>
    </div>
   </div>

@section('page-script')
<script>
 
 $( function() {  $( "#datei" ).datepicker({ dateFormat: "yy-mm-dd" }); } );
 $( function() {  $( "#datef" ).datepicker({ dateFormat: "yy-mm-dd" }); } );
</script>
@endsection
@endsection