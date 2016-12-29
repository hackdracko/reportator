@extends('layouts.master')

@section('content')
    <div class="page-bar">
    </div>
    <!-- END PAGE BAR -->
    <!-- BEGIN PAGE TITLE-->
    <h1 class="page-title"> Bienvenido <b>{{Auth::user()->name}}</b> al Sistema de Reportes
        <small>Estadisticas, Reportes, etc</small>
    </h1>
    <!-- END PAGE TITLE-->
    <!-- END PAGE HEADER-->
    <div class="row">

    </div>
    <div class="clearfix"></div>
@endsection
