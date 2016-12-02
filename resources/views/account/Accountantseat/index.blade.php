@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
    <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Módulo Contable</a></li>
         <li class ="breadcrumb-item active"><a href="{{url('Impuestos')}}">>Asientos Contables</a></li>
       </ol>
   <div class="row">
      <div class="col-lg-12">
            <h1 class="page-header"></h1>
      </div>
      
                <!-- /.col-lg-12 -->
  </div>

  <div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading"><strong>Asientos Contables</strong></div>
                <div class="panel-body">
                    
                          <br>
                                <p class="navbar-text navbar-left" style=" margin-top: 1px;">
                                  <button  type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Crear</button>
                                 </p>  <br><br><br>
                          <div class="table-responsive ">
                          <table class="table table-hover table-bordered table-responsive">
                            <thead>
                              <tr>
                                 <th>Fecha</th>
                                <th>Tipo</th>
                                <th>Numero</th>
                                <th>Empresa</th>
                                <th>Referencia</th>
                                <th>Diario</th>
                                <th>Importe</th>
                                <th>Estado</th>
                                 <th>Acciones</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                 @foreach($accountantseats as $accountantseat)
                              <tr>
                               
                                <td>{{$accountantseat->date}}</td>
                                <td>{{$accountantseat->code}}</td>
                                <td>{{$accountantseat->number}}</td>
                                <td>{{$accountantseat->company}}</td>
                                <td>{{$accountantseat->reference}}</td>
                                <td>{{$accountantseat->diario}}</td>
                                <td>{{$accountantseat->amount}}</td>
                                 <td>{{$accountantseat->state}}</td>
                                <td>
                                    <a href="{{route('AsientosContables.edit',$accoaccountantseatunt->id)}}">[Editar]</a> 
                                    <a href="{{route('AsientosContables.show',$accountantseat->id)}}">[Eliminar]</a>
                                </td>
                              </tr>
                               @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                             {!!$accountantseats->links()!!}
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
      document.location.href = "{{ route('AsientosContables.create')}}";
  });

</script>

@endsection
  
@endsection
