@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
    <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('/ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item active"><a href="{{url('/Tipo_Diario')}}">>Tipo Diario</a></li>
       </ol>
   <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Tipos de Diarios</h1>
      </div>
                <!-- /.col-lg-12 -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Diarios</strong></div>
                <div class="panel-body">
                    
                          <h2>Diarios</h2>
                          <br>
                                <p class="navbar-text navbar-left" style=" margin-top: 1px;">
                                  <button  type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo </button>
                                 </p>  <br><br><br>
                          <div class="table-responsive ">
                          <table class="table table-hover table-bordered table-responsive">
                            <thead>
                              <tr>
                                <th>Nombre del Diario</th>
                                <th>Descripción</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                 @foreach($journals as $journal)
                              <tr>
                               
                                <td>{{$journal->name}}</td>
                                <td>{{$journal->description}}</td>
                               
                                
                                <td>
                                    <a href="{{route('Tipo_Diario.edit',$journal->id)}}">[Editar]</a> 
                                    <a href="{{route('Tipo_Diario.show',$journal->id)}}">[Eliminar]</a>
                                </td>
                              </tr>
                               @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                             {!!$journals->links()!!}
                          </div>

                          </div>
                     

                </div>
            </div>
        </div>
    </div>
</div>
@section('page-script')
<script>

  $("#nuevo").click(function(event)
  {
      document.location.href = "{{ route('Tipo_Diario.create')}}";
  });

</script>

@endsection
  
@endsection
