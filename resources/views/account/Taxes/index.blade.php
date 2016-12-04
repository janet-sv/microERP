@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
    <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item active"><a href="{{url('Impuestos')}}">>Menu de Impuestos</a></li>
       </ol>
   <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Módulo de Impuestos</h1>
      </div>
      
                <!-- /.col-lg-12 -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Tabla de Impuestos</strong></div>
                <div class="panel-body">
                    
                          <h2>Impuestos</h2>
                          <br>
                                <p class="navbar-text navbar-left" style=" margin-top: 1px;">
                                  <button  type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Crear Impuesto</button>
                                 </p>  <br><br><br>
                          <div class="table-responsive ">
                          <table class="table table-hover table-bordered table-responsive">
                            <thead>
                              <tr>
                                <th>Nombre del Impuesto</th>
                                <th>Ambito del Impuesto</th>
                                <th>Calculo del Impuesto</th>
                                <th>Importe</th>
                                <th>Acciones</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                 @foreach($taxes as $taxe)
                              <tr>
                               
                                <td>{{$taxe->name}}</td>
                                <td>{{$taxe->scope_tax}}</td>
                                <td>{{$taxe->tax_calculation}}</td>
                                <td>{{$taxe->amount}}</td>
                                <td>
                                    <a href="{{route('Impuestos.edit',$taxe->id)}}">[Editar]</a> 
                                    <a href="{{route('Impuestos.show',$taxe->id)}}">[Eliminar]</a>
                                </td>
                              </tr>
                               @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                            {!!$taxes->links()!!}
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
      document.location.href = "{{ route('Impuestos.create')}}";
  });

</script>

@endsection
  
@endsection
