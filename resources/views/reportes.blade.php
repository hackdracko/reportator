@extends('layouts.master')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('/reportes') }}">Reporteador</a>
                <i class="fa fa-circle"></i>
            </li>
            <li>
                <span>Dashboard</span>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-bubble font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Reporteador</span>
                </div>
            </div>
            <div class="portlet-body">
                <ul class="nav nav-pills">
                    <li class="active">
                        <a href="#tab_graficas" data-toggle="tab"> Graficas </a>
                    </li>
                    <li>
                        <a href="#tab_documentos" data-toggle="tab"> Documentos </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab_graficas">
                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Marcas </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_marca" style="display:none"></div>
                                <div id="chartdiv_marca" style="width: 100%; height: 400px; display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Departamentos </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_departamento" style="display:none"></div>
                                <div id="chartdiv_departamento" style="width: 100%; height: 400px; display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Categorias </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_categoria" style="display:none"></div>
                                <div id="chartdiv_categoria" style="width: 100%; height: 400px; display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Presentacion </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_presentacion" style="display:none"></div>
                                <div id="chartdiv_presentacion" style="width: 100%; height: 400px; display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Productos </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_producto" style="display:none"></div>
                                <div id="chartdiv_producto" style="width: 100%; height: 400px; display:none"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_documentos">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
@section('javascript')
    <script>
        $('#btnbusqueda').on('click',function(e){
            e.preventDefault();
            $("#chartdiv_marca").hide();
            $("#chartdiv_departamento").hide();
            $("#chartdiv_categoria").hide();
            $("#chartdiv_presentacion").hide();
            $("#chartdiv_producto").hide();

            $("#modalFiltros").fadeOut(2000);
            setTimeout(function(){ $('#modalFiltros').modal('hide'); }, 2000);
            $("#div_marca").empty();
            $("#div_departamento").empty();
            $("#div_categoria").empty();
            $("#div_presentacion").empty();
            $("#div_producto").empty();
            datosJson("marca");
            datosJson("departamento");
            datosJson("categoria");
            datosJson("presentacion");
            datosJson("producto");

        });
        function datosJson (accion) {
            var marca = $('.select2-marca').select2("val");
            var departamento = $('.select2-departamento').select2("val");
            var categoria = $('.select2-categoria').select2("val");
            var presentacion = $('.select2-presentacion').select2("val");
            var productos = $('.select2-productos').select2("val");
            var fechaS = $('#rangoFecha').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var fechaF = $('#rangoFecha').data('daterangepicker').endDate.format('YYYY-MM-DD');
            var datos = {
                marca: marca,
                departamento: departamento,
                categoria: categoria,
                presentacion: presentacion,
                productos: productos,
                fechaS: fechaS,
                fechaF: fechaF,
                accion: accion
            };
            spinner(accion);
            var jqxhr = $.post( "{{ url('/ajax/busqueda') }}", datos, function(data) {
                chartMarca(accion, data);
                $("#spinner_"+accion).hide();
                $("#chartdiv_"+accion).show();
            })
                    .done(function() {
                        $("#spinner_"+accion).hide();
                        $("#chartdiv_"+accion).show();
                    })
                    .fail(function() {
                        alert( "Ocurrio un error mientras se procesaba la información" );
                    })
                    .always(function() {

                    });
            jqxhr.always(function() {

            });
        }
        function chartMarca(div, datos) {
            var chart = AmCharts.makeChart("chartdiv_"+div,{
                "type"    : "pie",
                "titleField"  : "nombre",
                "valueField"  : "count",
                "dataProvider"  : datos.resultado
            });
        }
        function chartTest(datos) {
            var chart2;

            var chartData2 = [
                {
                    "country": "USA",
                    "visits": 4025,
                    "color": "#FF0F00"
                },
                {
                    "country": "China",
                    "visits": 1882,
                    "color": "#FF6600"
                },
                {
                    "country": "Japan",
                    "visits": 1809,
                    "color": "#FF9E01"
                },
                {
                    "country": "Germany",
                    "visits": 1322,
                    "color": "#FCD202"
                },
                {
                    "country": "UK",
                    "visits": 1122,
                    "color": "#F8FF01"
                },
                {
                    "country": "France",
                    "visits": 1114,
                    "color": "#B0DE09"
                },
                {
                    "country": "India",
                    "visits": 984,
                    "color": "#04D215"
                },
                {
                    "country": "Spain",
                    "visits": 711,
                    "color": "#0D8ECF"
                },
                {
                    "country": "Netherlands",
                    "visits": 665,
                    "color": "#0D52D1"
                },
                {
                    "country": "Russia",
                    "visits": 580,
                    "color": "#2A0CD0"
                },
                {
                    "country": "South Korea",
                    "visits": 443,
                    "color": "#8A0CCF"
                },
                {
                    "country": "Canada",
                    "visits": 441,
                    "color": "#CD0D74"
                },
                {
                    "country": "Brazil",
                    "visits": 395,
                    "color": "#754DEB"
                },
                {
                    "country": "Italy",
                    "visits": 386,
                    "color": "#DDDDDD"
                },
                {
                    "country": "Australia",
                    "visits": 384,
                    "color": "#999999"
                },
                {
                    "country": "Taiwan",
                    "visits": 338,
                    "color": "#333333"
                },
                {
                    "country": "Poland",
                    "visits": 328,
                    "color": "#000000"
                }
            ];


            AmCharts.ready(function () {
                // SERIAL CHART
                chart2 = new AmCharts.AmSerialChart();
                chart2.dataProvider = chartData2;
                chart2.categoryField = "country";
                // the following two lines makes chart 3D
                chart2.depth3D = 20;
                chart2.angle = 30;

                // AXES
                // category
                var categoryAxis = chart2.categoryAxis;
                categoryAxis.labelRotation = 90;
                categoryAxis.dashLength = 5;
                categoryAxis.gridPosition = "start";

                // value
                var valueAxis = new AmCharts.ValueAxis();
                valueAxis.title = "Visitors";
                valueAxis.dashLength = 5;
                chart2.addValueAxis(valueAxis);

                // GRAPH
                var graph = new AmCharts.AmGraph();
                graph.valueField = "visits";
                graph.colorField = "color";
                graph.balloonText = "<span style='font-size:14px'>[[category]]: <b>[[value]]</b></span>";
                graph.type = "column";
                graph.lineAlpha = 0;
                graph.fillAlphas = 1;
                chart2.addGraph(graph);

                // CURSOR
                var chartCursor2 = new AmCharts.ChartCursor();
                chartCursor2.cursorAlpha = 0;
                chartCursor2.zoomable = false;
                chartCursor2.categoryBalloonEnabled = false;
                chart2.addChartCursor(chartCursor2);

                chart2.creditsPosition = "top-right";


                // WRITE
                chart2.write("chartdiv2");
            });
        }
    </script>
    </head>

    <body>
    <div id="chartdiv" style="width: 100%; height: 400px;"></div>
    </body>
@endsection
