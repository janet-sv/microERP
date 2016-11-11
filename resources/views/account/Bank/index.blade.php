@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
    <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Modulo Contable</a></li>
         <li class ="breadcrumb-item active"><a href="{{url('Impuestos')}}">>Menu de Bancos</a></li>
       </ol>
   <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header">Modulo de Bancos</h1>
      </div>
      
                <!-- /.col-lg-12 -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Tabla de Bancos</strong></div>
                <div class="panel-body">
                    
                          <h2>Bancos</h2>
                          <br>
                                <p class="navbar-text navbar-left" style=" margin-top: 1px;">
                                  <button  type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Nuevo Banco</button>
                                 </p>  <br><br><br>
                          <div class="table-responsive ">
                          <table class="table table-hover table-bordered table-responsive">
                            <thead>
                              <tr>
                                <th>Nombre del Banco</th>
                                <th>Numero de Cuenta</th>
                                <th>Metodos de Débito</th>
                                <th>Metodos de Pago</th>
                                <th>Acciones</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                 @foreach($banks as $bank)
                              <tr>
                               
                                <td>{{$bank->name_bank}}</td>
                                <td>{{$bank->number}}</td>
                                <td>{{$bank->debit}}</td>
                                <td>{{$bank->debit}}</td>
                                <td>
                                    <a href="{{route('Bancos.edit',$bank->id)}}">[Editar]</a> 
                                    <a href="{{route('Bancos.show',$bank->id)}}">[Eliminar]</a>
                                </td>
                              </tr>
                               @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                             {!!$banks->links()!!}
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
      document.location.href = "{{ route('Bancos.create')}}";
  });

</script>

@endsection
  
@endsection
