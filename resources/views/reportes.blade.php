@extends('layouts.master')

@section('content')
    <style>
        .amcharts-export-menu-top-right {
            top: 10px;
            right: 0;
        }
    </style>
    <script src="http://files.codepedia.info/uploads/iScripts/html2canvas.js"></script>
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
                                    <i class="fa fa-bar-chart-o"></i> Marcas por Unidades </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#" onClick="getExcel('marca_unidades')">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_marca_unidades" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_marca_unidades" style="display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Marcas por Importe </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_marca_importe" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_marca_importe" style="display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Departamentos por Unidades </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_departamento_unidades" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_departamento_unidades" style="display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Departamentos por Importe </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_departamento_importe" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_departamento_importe" style="display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Categorias por Unidades</div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_categoria_unidades" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_categoria_unidades" style="display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Categorias por Importe</div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_categoria_importe" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_categoria_importe" style="display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Presentación por Unidades </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_presentacion_unidades" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_presentacion_unidades" style="display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Presentación por Importe </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_presentacion_importe" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_presentacion_importe" style="display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Productos por Unidades</div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_producto_unidades" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_producto_unidades" style="display:none"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Productos por Importe</div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_producto_importe" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_producto_importe" style="display:none"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Top 20 productos más vendidos </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_topproductos" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_topproductos" style="display:none"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Top 20 tiendas </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_toptiendas" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_toptiendas" style="display:none"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_inventario">
                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Inventario Existencias </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_inventarioexistencias" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_inventarioexistencias" style="display:none"></div>
                            </div>
                        </div>
                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Inventario Importe </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_inventarioimporte" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_inventarioimporte" style="display:none"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab_cliente">
                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Grupo </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_grupo" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_grupo" style="display:none;"></div>
                            </div>
                        </div>

                        <div class="portlet box blue col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Formato </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_formato" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_formato" style="display:none;"></div>
                            </div>
                        </div>
                        <div class="portlet box blue col-md-offset-3 col-md-6">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Cadena </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_cadena" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_cadena" style="display:none;"></div>
                            </div>
                        </div>
                        <div class="portlet box blue col-md-12">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="fa fa-bar-chart-o"></i> Sucursal </div>
                                <div class="tools">
                                    <a href="#" class="collapse" data-original-title="" title=""> </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn green btn-sm btn-outlin dropdown-toggle" data-toggle="dropdown"> Opciones
                                            <i class="fa fa-angle-down"></i>
                                        </button>
                                        <ul class="dropdown-menu pull-right" role="menu">
                                            <li>
                                                <a href="#">
                                                    <i class="fa fa-file-excel-o"></i> Exportar a Excel</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="portlet-body form">
                                <div id="spinner_sucursal" style="display:none"></div>
                                <div class="contains-chart" id="chartdiv_sucursal" style="display:none"></div>
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


    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <div class="clearfix"></div>
@endsection
@section('javascript')
    <script>
        $(function(){
            $('#modalFiltros').modal('show');

            $(document).on( 'shown.bs.tab', 'a[data-toggle="tab"]', function (e) {
                // on tab selection event
                $( ".contains-chart" ).each(function() { // target each element with the .contains-chart class
                    var chart = $(this).highcharts(); // target the chart itself
                    chart.reflow() // reflow that chart
                });
            })

            Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
                return {
                    radialGradient: {
                        cx: 0.5,
                        cy: 0.3,
                        r: 0.7
                    },
                    stops: [
                        [0, color],
                        [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
                    ]
                };
            });
            Highcharts.setOptions({
                chart: {
                    style: {
                        fontFamily: 'serif'
                    }
                },
                credits: {
                    enabled: false
                }
            });
        });

        $('#btnbusqueda').on('click',function(e){
            e.preventDefault();
            $("#chartdiv_marca_unidades").hide();
            $("#chartdiv_marca_importe").hide();
            $("#chartdiv_departamento_unidades").hide();
            $("#chartdiv_departamento_importe").hide();
            $("#chartdiv_categoria_unidades").hide();
            $("#chartdiv_categoria_importe").hide();
            $("#chartdiv_presentacion_unidades").hide();
            $("#chartdiv_presentacion_importe").hide();
            $("#chartdiv_producto_unidades").hide();
            $("#chartdiv_producto_importe").hide();
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
            /*$("#div_marca_unidades").empty();
            $("#div_marca_importe").empty();
            $("#div_departamento_unidades").empty();
            $("#div_departamento_importe").empty();
            $("#div_categoria_unidades").empty();
            $("#div_categoria_importe").empty();
            $("#div_presentacion_unidades").empty();
            $("#div_presentacion_importe").empty();
            $("#div_producto").empty();
            $("#div_topproductos").empty();
            $("#div_toptiendas").empty();
            $("#div_inventarioexistencias").empty();
            $("#div_inventarioimporte").empty();
            $("#div_grupo").empty();
            $("#div_formato").empty();
            $("#div_cadena").empty();
            $("#div_sucursal").empty();*/
            datosJson("marca_unidades", 1);
            datosJson("marca_importe", 1);
            datosJson("departamento_unidades", 1);
            datosJson("departamento_importe", 1);
            datosJson("categoria_unidades", 1);
            datosJson("categoria_importe", 1);
            datosJson("presentacion_unidades", 1);
            datosJson("presentacion_importe", 1);
            datosJson("producto_unidades", 2);
            datosJson("producto_importe", 2);
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
                accion: 'topproductos',
                type: 1
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
            var tipoBusqueda = $('#tipoBusqueda').val();
            var marca = $('.select2-marca').select2("val");
            var departamento = $('.select2-departamento').select2("val");
            var categoria = $('.select2-categoria').select2("val");
            var presentacion = $('.select2-presentacion').select2("val");
            var productos = $('.select2-productos').select2("val");
            var fechaS = $('#rangoFecha').data('daterangepicker').startDate.format('YYYY-MM-DD');
            var fechaF = $('#rangoFecha').data('daterangepicker').endDate.format('YYYY-MM-DD');
            var datos = {
                tipoBusqueda: tipoBusqueda,
                marca: marca,
                departamento: departamento,
                categoria: categoria,
                presentacion: presentacion,
                productos: productos,
                fechaS: fechaS,
                fechaF: fechaF,
                chart: chart,
                accion: accion,
                type: 0
            };
            spinner(accion);
            var jqxhr = $.post( "{{ url('/ajax/busqueda') }}", datos, function(data) {
                if(chart == 1){
                    chartPie(accion, data);
                }
                if(chart == 2){
                    chartColumn(accion, data);
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
            var fecha  = $("#rangoFecha").val();
            // Build the chart
            var initializeChart = function() {
                Highcharts.chart("chartdiv_"+div, {
                    chart: {
                        type: 'pie'
                    },
                    title: {
                        text: 'Información '+fecha
                    },
                    tooltip: {
                        pointFormat: 'Porcentaje <b>{point.percentage:.1f}%</b> Cantidad <b> {point.total}'
                    },
                    plotOptions: {
                        pie: {
                            allowPointSelect: true,
                            cursor: 'pointer',
                            dataLabels: {
                                enabled: true,
                                /*format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                                style: {
                                    color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                },
                                connectorColor: 'silver'*/
                            }
                        }
                    },
                    series: [{
                        name: datos.categories,
                        data: datos.data
                    }]
                });
            }
            window.setTimeout(initializeChart, 500);
        }
        function chartColumn(div, datos) {
            var fecha  = $("#rangoFecha").val();
            var initializeChart = function() {
                Highcharts.chart("chartdiv_" + div, {
                    chart: {
                        type: 'column',
                        events: {
                            load: function () {
                                $(window).resize();
                            }
                        }
                    },
                    title: {
                        text: 'Información '+fecha
                    },

                    subtitle: {
                        text: ''
                    },

                    xAxis: {
                        max: 19,
                        categories: datos.categories,
                        scrollbar: {
                            enabled: true,
                            barBackgroundColor: 'gray',
                            barBorderRadius: 7,
                            barBorderWidth: 0,
                            buttonBackgroundColor: 'gray',
                            buttonBorderWidth: 0,
                            buttonArrowColor: 'yellow',
                            buttonBorderRadius: 7,
                            rifleColor: 'yellow',
                            trackBackgroundColor: 'white',
                            trackBorderWidth: 1,
                            trackBorderColor: 'silver',
                            trackBorderRadius: 7
                        }
                    },
                    series: [{
                        pointPadding: 0,
                        colorByPoint: true,
                        data: datos.data,
                        showInLegend: false
                    }],
                    responsive: {
                        rules: [{
                            condition: {
                                maxWidth: 500
                            },
                            chartOptions: {
                                legend: {
                                    align: 'center',
                                    verticalAlign: 'bottom',
                                    layout: 'horizontal'
                                },
                                yAxis: {
                                    labels: {
                                        align: 'left',
                                        x: 0,
                                        y: -5
                                    },
                                    title: {
                                        text: null
                                    }
                                },
                                subtitle: {
                                    text: null
                                }
                            }
                        }]
                    }

                });
            }
            window.setTimeout(initializeChart, 200);
        }
        function getPng(download, div){
            html2canvas($("#"+div) , {
                onrendered: function (canvas) {
                    dataURL = canvas.toDataURL("image/png");
                    var newData = dataURL.replace(/^data:image\/png/, "data:application/octet-stream");
                    $("#"+download).attr("download", "image.png").attr("href", newData);
                }
            });
        }
        function getExcel(accion){
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
                accion: accion,
                type: 1
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
        }
    </script>
    <script src="http://code.highcharts.com/stock/highstock.js"></script>
    <script src="http://code.highcharts.com/modules/exporting.js"></script>

@endsection
