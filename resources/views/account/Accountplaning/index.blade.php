@extends('account.homeAccount')

@section('content')

   <!-- Main component for a primary marketing message or call to action -->
    <ol class="breadcrumb">
         <li class ="breadcrumb-item"><a href="{{url('ModuloContable')}}">>Modulo Contable</a></li>
         <li class ="breadcrumb-item active"><a href="{{url('Impuestos')}}">>Plan Contable General</a></li>
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
                <div class="panel-heading"><strong>Plan Contable</strong></div>
                <div class="panel-body">
                    
                          <br>
                                <p class="navbar-text navbar-left" style=" margin-top: 1px;">
                                  <button  type="button" id='nuevo'  name='nuevo' class="btn btn-warning navbar-btn" style="margin-bottom: 1px; margin-top: -5px;margin-right: 8px;padding: 3px 20px;">Agregar Cuenta</button>
                                 </p>  <br><br><br>
                          <div class="table-responsive ">
                          <table class="table table-hover table-bordered table-responsive">
                            <thead>
                              <tr>
                                <th>Nombre de la cuenta</th>
                                <th>Nivel de cuenta</th>
                                <th>Tipo de cuenta</th>
                                <th>Tipo de analisis</th>
                                <th>Cta. al DEBE</th>
                                <th>Cta. al HABER</th>
                                <th>Acciones</th>
                                
                              </tr>
                            </thead>
                            <tbody>
                                 @foreach($accounts as $account)
                              <tr>
                               
                                <td>{{$account->code}}</td>
                                <td>{{$account->name}}</td>
                                <td>{{$account->account_level}}</td>
                                <td>{{$account->account_type}}</td>
                                <td>{{$account->analysis_type}}</td>
                                <td>{{$account->debit}}</td>
                                <td>{{$account->credit}}</td>
                                <td>
                                    <a href="{{route('PlanContable.edit',$account->id)}}">[Editar]</a> 
                                    <a href="{{route('PlanContable.show',$account->id)}}">[Eliminar]</a>
                                </td>
                              </tr>
                               @endforeach
                            </tbody>
                          </table>
                          <div class="text-center">
                             {!!$accounts->links()!!}
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
      document.location.href = "{{ route('PlanContable.create')}}";
  });

</script>

@endsection
  
@endsection
