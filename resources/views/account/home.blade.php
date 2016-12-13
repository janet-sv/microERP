@extends('account.homeAccount')

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Contabilidad - Panel de Control</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-cart-arrow-down fa-5x" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>Facturas de clientes</div>
                                </div>
                            </div>
                        </div>
                        <a href="/FacturasClientes">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                       <div id="pieVentas" style="width: 570px; height: 500px;"></div>
   
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-briefcase fa-5x" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>Facturas de proveedores</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                       <div id="pieCompras" style="width: 570px; height: 500px;"></div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-credit-card-alt fa-5x" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>Pagos en Ventas</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                       <div id="piePagosVentas" style="width: 570px; height: 500px;"></div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-credit-card fa-5x" aria-hidden="true"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Pagos en Compras</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">Ver detalles</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                       <div id="piePagosCompras" style="width: 570px; height: 500px;"></div>
                    </div>
                </div>
            </div>
  

@section('page-script')
<script>
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Cerradas',     11],
          ['Abiertas',  3]
        ]);

        var options = {
          title: 'Estado de Facturas - Ventas'
        };

        var chart = new google.visualization.PieChart(document.getElementById('pieVentas'));

        chart.draw(data, options);
      }

</script>
<script>
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
            ['Cerradas',     11],
            ['Abiertas',  3]
        ]);

        var options = {
          title: 'Estado de Facturas - Compras'
        };

        var chart = new google.visualization.PieChart(document.getElementById('pieCompras'));

        chart.draw(data, options);
      }

</script>
<script>
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
           ['Pago en Banco',     5],
           ['Pago en Efectivo',  11]
        ]);

        var options = {
          title: 'Tipos de Pagos - Ventas'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piePagosVentas'));

        chart.draw(data, options);
      }

</script>
<script>
google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
            ['Pago en Banco',     5],
           ['Pago en Efectivo',  11]
         
        ]);

        var options = {
          title: 'Tipos de Pagos - Compras'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piePagosCompras'));

        chart.draw(data, options);
      }

</script>


@endsection
@endsection