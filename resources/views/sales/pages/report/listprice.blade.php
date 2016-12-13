@extends('sales.layouts.base')

@section('title', 'Ventas')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Reportes</h1>
    </div>
</div>

<div class="clearfix"></div>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">

            <div class="clearfix"></div>

            <ul class="tabs-page">                  
                <a href="{{route('report.sales')}}">
                    <div class="tab-page-wrapper">
                        <li class="tab-page">Ventas</li>
                    </div>
                </a>                
                <a href="{{route('report.rotation')}}">
                    <div class="tab-page-wrapper">
                        <li class="tab-page">Rotación de productos</li>
                    </div>
                </a>                                              
                <div class="tab-page-wrapper active">
                    <li class="tab-page">Precios de lista</li>
                </div>                
            </ul>            
            <div class="tab-content-container">
                <br>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-primary">                            
                            <div class="panel-body">
                                <form method="GET" action="{{route('report.listprice')}}">
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            {{Form::label('Desde ',null, ['class'=>'control-label'] )}}                                         
                                            <div class="input-group date" id="fecha_inicio_reporte">
                                                <input type="text" class="form-control input-date" name="beginDate" id="fecha_inicio" placeholder="aaaa-mm-dd" required/>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>                                                              
                                        </div>
                                        <div class="form-group col-lg-6">
                                            {{Form::label('Hasta ',null, ['class'=>'control-label'] )}}                                         
                                            <div class="input-group date" id="fecha_fin_reporte">
                                                <input type="text" class="form-control input-date" name="endDate" id="fecha_fin" placeholder="aaaa-mm-dd" required/>
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                            </div>                                                              
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Categoría de producto</label>
                                                <select class="form-control" name="categoryproduct" id="categoryproduct">                                           
                                                    <option value="0">Seleccione</option>
                                                    @foreach($categoryproducts as $categoryproduct)                                    
                                                        <option value="{{$categoryproduct->id}}" >{{$categoryproduct->name}}</option>                                    
                                                    @endforeach  
                                                </select>
                                            </div>
                                        </div>                                   
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Producto</label>
                                                <select class="form-control" name="product" id="product">                                           
                                                    <option value="0">Seleccione</option>                                            
                                                </select>
                                            </div>
                                        </div>
                                    </div>      
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12 col-xs-12">                                        
                                             <button class="btn btn-submit btn-warning pull-left" id="search" type="submit"><i class="fa fa-search"></i> Buscar</button>
                                        </div>
                                    </div>
                                </form>    
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped responsive-utilities jambo_table bulk_action">
                        <thead>
                            <tr class="headings">
                                <th class="column-title">Posición </th>
                                <th class="column-title">Item</th>
                                <th class="column-title">Precio unitario </th>
                                <th class="column-title">Estado </th>
                                <th class="column-title">Fecha de modificación </th>                            
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($listprices as  $key => $listprice)
                            <tr class="even pointer">
                                <td>{{ $key + 1 }}</td>                                         
                                <td>{{ $listprice->product->name }}</td> 
                                <td>{{ round($listprice->precio,2) }}</td>
                                @if ( $listprice->estado == 1)                               
                                    <td>Activo</td>                                         
                                @else                                
                                    <td>Inactivo</td> 
                                @endif
                                <td>{{date("d/m/Y", strtotime($listprice->updated_at)) }}</td>   
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $listprices->links() }}
                </div>
            </div>

        </div>
    </div>
</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        //
        $("#fecha_inicio_reporte").datepicker({
            format: "yyyy-mm-dd",
            startDate: "2016-01-01", 
            language: "es",
            autoclose: true,
            todayHighlight: true
        });    
        $('#fecha_inicio_reporte').datepicker('setDate',"");

        $("#fecha_fin_reporte").datepicker({
            format: "yyyy-mm-dd",
            startDate: "2016-01-01", 
            language: "es",
            autoclose: true,
            todayHighlight: true
        });    
        
        $('#fecha_fin_reporte').datepicker('setDate', "" );
        var inputStartDate = $('#fecha_inicio_reporte').children(".input-date");
        inputStartDate.change(function() {        
            var valueInputStart = $(this).val();
            $('#fecha_fin_reporte').datepicker('setStartDate', valueInputStart);
            $('#fecha_fin_reporte').datepicker('setDate', valueInputStart);
        });

        $("body").on('change', "#categoryproduct", function(){                
            $.ajax({
                method: 'GET',
                url: "{{ route('report.findProducts')}}",            
                data: {
                    option: $('#categoryproduct').val(),                     
                },
                success: function(response) {
                    $('#product').html(response['html']);
                }
            });  
        });         

    });
</script>
@endsection