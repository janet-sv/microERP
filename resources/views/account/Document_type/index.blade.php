@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
    <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('/ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item active"><a href="{{url('/Tipo_de_documento')}}">>Tipo de documento</a></li>
       </ol>
   <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Tipos de documentos</h1>
      </div>
                <!-- /.col-lg-12 -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Documentos</strong></div>
                <div class="panel-body">
                    
                          <h2>Documentos</h2>
                          <br>
                                <p class="navbar-text navbar-left" style=" margin-top: 1px;">
                                  <button  type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo </button>
                                 </p>  <br><br><br>
                          <div class="table-responsive ">
                          <table class="table table-hover table-bordered table-responsive">
                            <thead>
                              <tr>
                                <th>Nombre del documento</th>
                                <th>Descripción</th>
                                <th>Numeración</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                                 @foreach($document_types as $document_type)
                              <tr>
                               
                                <td>{{$document_type->name}}</td>
                                <td>{{$document_type->description}}</td>
                                <td>{{$document_type->numeration}}</td>
                                
                                <td>
                                    <a href="{{route('Tipo_de_documento.edit',$document_type->id)}}">[Editar]</a> 
                                    <a href="{{route('Tipo_de_documento.show',$document_type->id)}}">[Eliminar]</a>
                                </td>
                              </tr>
                               @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                             {!!$document_types->links()!!}
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
      document.location.href = "{{ route('Tipo_de_documento.create')}}";
  });

</script>

@endsection
  
@endsection
