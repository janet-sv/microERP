@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<section class="home-container">    
        <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Precio de lista</h1>
                </div>
                <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Datos del precio de lista
                    </div>
                    <div class="panel-body">                        
                        {{Form::open(['route' => ['listprice.update', $listprice->id], 'id'=>'formSuggestion'])}}
                            <div class="row">                                
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Categoría de producto</label>
                                        <select class="form-control" name="categoria_producto" id="categoria_producto">                                           
                                            <option value="0">Seleccione</option>
                                            @foreach($categoryproducts as $categoryproduct)                                    
                                                <option value="{{$categoryproduct->id}}"  @if($categoryproduct->id==$listprice->product->category->id) selected @endif >{{$categoryproduct->name}}</option>                                    
                                            @endforeach                                            
                                        </select>
                                    </div>
                                </div>                                   
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Producto</label>
                                        <select class="form-control" name="producto" id="producto">                                           
                                            <option value="0">Seleccione una categoría primero</option>                                            
                                        </select>
                                    </div>
                                </div>                                                                                         
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Precio de venta</label>
                                        <input class="form-control" name="precio" placeholder="Precio" value="{{$listprice->precio}}" maxlength="7">
                                    </div>                               
                                </div>                                                           
                            </div>                                                        
                            <div class="col-lg-12">                                    
                                <button class="btn btn-success pull-right" type="submit">Guardar</button>                                    
                                <a class="btn btn-default pull-right" href="{{ route('listprice.index') }}">Cancelar</a>                                      
                            </div>
                        {{Form::close()}}
                    </div>                              
                </div>
            </div>                              
        </div>  
</section>

<script type="text/javascript">
    $(document).ready(function() {        

        $.ajax({
            method: 'GET',
            url: "{{ route('listprice.findProductsInEdit')}}",            
            data: {
                option: $('#categoria_producto').val(), 
                idProduct: {{$listprice->product->id}},
            },
            success: function(response) {                
                $('#producto').html(response['html']);
            }
        });
        
        //Para el select
        $('#categoria_producto').change(function(){            
            $.ajax({
                method: 'GET',
                url: "{{ route('listprice.findProducts')}}",            
                data: {
                    option: $('#categoria_producto').val(),                     
                },
                success: function(response) {
                    $('#producto').html(response['html']);
                }
             });
        });
    });

</script>
@endsection