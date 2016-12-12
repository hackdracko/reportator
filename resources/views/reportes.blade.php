@extends('layouts.master')

@section('content')
    <style>
        .amcharts-export-menu-top-right {
            top: 10px;
            right: 0;
        }
    </style>
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
                        <a href="#tab_ventas" data-toggle="tab"> Información por Ventas </a>
                    </li>
                    <li>
                        <a href="#tab_inventario" data-toggle="tab"> Información por Inventario </a>
                    </li>
                    <li>
                        <a href="#tab_cliente" data-toggle="tab"> Información por Cliente </a>
                    </li>
                    <li>
                        <a href="#tab_documentos" data-toggle="tab"> Exportar Información </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade active in" id="tab_ventas">
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

                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Top 20 productos más vendidos </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_topproductos" style="display:none"></div>
                                <div id="chartdiv_topproductos" style="width: 100%; height: 400px; display:none"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Top 20 tiendas </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_toptiendas" style="display:none"></div>
                                <div id="chartdiv_toptiendas" style="width: 100%; height: 400px; display:none"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_inventario">
                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Inventario Existencias </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_inventarioexistencias" style="display:none"></div>
                                <div id="chartdiv_inventarioexistencias" style="width: 100%; height: 400px; display:none"></div>
                            </div>
                        </div>
                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Inventario Importe </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_inventarioimporte" style="display:none"></div>
                                <div id="chartdiv_inventarioimporte" style="width: 100%; height: 400px; display:none"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_cliente">
                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Grupo </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_grupo" style="display:none"></div>
                                <div id="chartdiv_grupo" style="width: 100%; height: 400px; display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Formato </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_formato" style="display:none"></div>
                                <div id="chartdiv_formato" style="width: 100%; height: 400px; display:none;"></div>
                            </div>
                        </div>
                        <div class="portlet box blue col-md-offset-3 col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Cadena </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_cadena" style="display:none"></div>
                                <div id="chartdiv_cadena" style="width: 100%; height: 400px; display:none;"></div>
                            </div>
                        </div>
                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-gift"></i> Sucursal </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                    <a href="#" class="reload" data-original-title="" title=""> </a>
                                    <a href="#" class="remove" data-original-title="" title=""> </a>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_sucursal" style="display:none"></div>
                                <div id="chartdiv_sucursal" style="width: 100%; height: 400px; display:none"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_documentos">
                        <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="color-demo export-excel" data-original-title="Click to view demos for this color" data-toggle="modal" data-target="#demo_modal_white">
                                <div class="color-view bg-blue bg-font-blue bold uppercase"><img src="https://lh3.ggpht.com/GkNfqm17WFuzaIR87_oz690ErF63hL08Ngj73QtDxyWlCOF80d2gWd2GHrPLJJ-YmHYS=w300-rw" height="100px" width="100px"></div>
                                <div class="color-info bg-white c-font-14 sbold"> Exportar a Excel </div>
                            </div>
                            <div style="display:none;" id="linkExcel" class="text-center"><a id="hrefExcel" href="">Descargar</a></div>
                        </div>
                        <!-- <div class="col-md-3 col-sm-3 col-xs-3">
                            <div class="color-demo export-pdf" data-original-title="Click to view demos for this color" data-toggle="modal" data-target="#demo_modal_white">
                                <div class="color-view bg-blue bg-font-blue bold uppercase"><img src="https://lh4.ggpht.com/u9ofV9e2diX3giScuXT46B4A0vxFw8tj5NzHQJVAqAKwL5b_o8CHnO-qiZZIZYHlTg=w300-rw" height="100px" width="100px"></div>
                                <div class="color-info bg-white c-font-14 sbold"> Exportar a Pdf </div>
                            </div>
                            <div class="text-center"><a id="hrefPdf" href="">Descargar</a></div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
@endsection
@section('javascript')
    <script>
        $(function(){
            $('#modalFiltros').modal('show');
        });
        $('#btnbusqueda').on('click',function(e){
            e.preventDefault();
            $("#chartdiv_marca").hide();
            $("#chartdiv_departamento").hide();
            $("#chartdiv_categoria").hide();
            $("#chartdiv_presentacion").hide();
            $("#chartdiv_producto").hide();
            $("#chartdiv_topproductos").hide();
            $("#chartdiv_toptiendas").hide();
            $("#chartdiv_inventarioexistencias").hide();
            $("#chartdiv_inventarioimporte").hide();
            $("#chartdiv_grupo").hide();
            $("#chartdiv_formato").hide();
            $("#chartdiv_cadena").hide();
            $("#chartdiv_sucursal").hide();

            $("#modalFiltros").fadeOut(2000);
            setTimeout(function(){ $('#modalFiltros').modal('hide'); }, 2000);
            $("#div_marca").empty();
            $("#div_departamento").empty();
            $("#div_categoria").empty();
            $("#div_presentacion").empty();
            $("#div_producto").empty();
            $("#div_topproductos").empty();
            $("#div_toptiendas").empty();
            $("#div_inventarioexistencias").empty();
            $("#div_inventarioimporte").empty();
            $("#div_grupo").empty();
            $("#div_formato").empty();
            $("#div_cadena").empty();
            $("#div_sucursal").empty();
            datosJson("marca", 1);
            datosJson("departamento", 1);
            datosJson("categoria", 1);
            datosJson("presentacion", 1);
            datosJson("producto", 2);
            datosJson("topproductos", 2);
            datosJson("toptiendas", 2);
            datosJson("inventarioexistencias", 2);
            datosJson("inventarioimporte", 2);
            datosJson("grupo", 1);
            datosJson("formato", 1);
            datosJson("cadena", 1);
            datosJson("sucursal", 2);

        });
        $('.export-excel').on('click',function(e){
            $("#linkExcel").hide();
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
                accion: 'xls'
            };
            var jqxhr = $.post( "{{ url('/ajax/busqueda') }}", datos, function(data) {
                $("#hrefExcel").attr('href', '{{url('/download/')}}/'+data.filename+'.xls');
                $("#linkExcel").show();
            })
                    .done(function() {
                    })
                    .fail(function() {
                        alert( "Ocurrio un error mientras se procesaba la información" );
                    })
                    .always(function() {

                    });
            jqxhr.always(function() {

            });
        });
        function datosJson (accion, chart) {
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
                if(chart == 1){
                    chartPie(accion, data);
                }
                if(chart == 2){
                    chartSerial(accion, data);
                }
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
        function chartPie(div, datos) {
            var chart = AmCharts.makeChart("chartdiv_"+div,{
                "type"    : "pie",
                "titleField"  : "nombre",
                "valueField"  : "count",
                "dataProvider"  : datos.resultado,
                "export": {
                    "enabled": true,
                    "libs": {
                        "path": "../assets/global/plugins/amcharts/amcharts/export/libs/"
                    }
                }

            });
        }
        function chartSerial(div, datos) {
            var chart = AmCharts.makeChart("chartdiv_"+div,{
                "type"    : "serial",
                "marginRight": 70,
                "pathToImages": "http://cdn.amcharts.com/lib/3/images/", // required for grips
                "chartScrollbar": {
                    "updateOnReleaseOnly": true
                },
                "dataProvider"  : datos.resultado,
                "valueAxes": [{
                    "axisAlpha": 0,
                    "position": "left"
                }],
                "startDuration": 1,
                "graphs": [{
                    "balloonText": "<b>[[category]]: [[value]]</b>",
                    "fillColorsField": "color",
                    "fillAlphas": 0.9,
                    "lineAlpha": 0.2,
                    "type": "column",
                    "valueField": "count"
                }],
                "chartCursor": {
                    "categoryBalloonEnabled": false,
                    "cursorAlpha": 0,
                    "zoomable": false
                },
                "categoryField": "nombre",
                "categoryAxis": {
                    "gridPosition": "start",
                    "labelRotation": 45
                },
                "export": {
                    "enabled": true,
                    "libs": {
                        "path": "../assets/global/plugins/amcharts/amcharts/export/libs/"
                    }
                }
            });
        }
    </script>
    <script src="//cdn.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link  type="text/css" href="//cdn.amcharts.com/lib/3/plugins/export/export.css" rel="stylesheet">
@endsection
