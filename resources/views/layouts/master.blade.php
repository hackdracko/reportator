<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
    <meta charset="utf-8" />
    <title>Cubo</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Reportator" name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/morris/morris.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/fullcalendar/fullcalendar.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/jqvmap/jqvmap/jqvmap.css')}}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('../assets/global/css/components.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('../assets/global/css/plugins.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="{{ asset('../assets/layouts/layout/css/layout.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/layouts/layout/css/themes/darkblue.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
    <link href="{{ asset('../assets/layouts/layout/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('../assets/global/plugins/select2/css/select2-bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

    <style>

        .filtros {
            position: fixed;
            z-index: 10103;
            top: 45%;
            right: 15px;
            margin-top: -230px;
            cursor: pointer;
        }
        .divfiltros {
            position: fixed;
            z-index: 10103;
            top: 45%;
            right: 55px;
            margin-top: -207px;
            background-color: rgba(56, 87, 85, 0.82);
            z-index: 1;
        }
        .loading {
            font: 26px/1.5 Monospace;
            color: #FF3F3F;
            -webkit-perspective: 100px;
            perspective: 100px;
        }
        .loading > span {
            -webkit-animation: flip 2s infinite;
            animation: flip 2s infinite;
            display: inline-block;
            -webkit-transform-origin: 50% 50% -10px;
            transform-origin: 50% 50% -10px;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
        }
        .loading > span:nth-child(1) {
            -webkit-animation-delay: 0.1s;
            animation-delay: 0.1s;
        }
        .loading > span:nth-child(2) {
            -webkit-animation-delay: 0.2s;
            animation-delay: 0.2s;
        }
        .loading > span:nth-child(3) {
            -webkit-animation-delay: 0.3s;
            animation-delay: 0.3s;
        }
        .loading > span:nth-child(4) {
            -webkit-animation-delay: 0.4s;
            animation-delay: 0.4s;
        }
        .loading > span:nth-child(5) {
            -webkit-animation-delay: 0.5s;
            animation-delay: 0.5s;
        }
        .loading > span:nth-child(6) {
            -webkit-animation-delay: 0.6s;
            animation-delay: 0.6s;
        }
        .loading > span:nth-child(7) {
            -webkit-animation-delay: 0.7s;
            animation-delay: 0.7s;
        }

        @-webkit-keyframes flip {
            to {
                -webkit-transform: rotateX(1turn);
                transform: rotateX(1turn);
            }
        }

        @keyframes flip {
            to {
                -webkit-transform: rotateX(1turn);
                transform: rotateX(1turn);
            }
        }
        .backspin {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            height: 400px;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
            background-color: #002031;
        }
        @-webkit-keyframes animIn {
            0% {
                -webkit-transform: translateX(-100px);
                transform: translateX(-100px);
                opacity: 0
            }

            50% {
                opacity: 1
            }

            100% {
                -webkit-transform: translateX(100px);
                transform: translateX(100px);
                opacity: 0
            }
        }

        @keyframes animIn {
            0% {
                -webkit-transform: translateX(-100px);
                transform: translateX(-100px);
                opacity: 0
            }

            50% {
                opacity: 1
            }

            100% {
                -webkit-transform: translateX(100px);
                transform: translateX(100px);
                opacity: 0
            }
        }

        .loader {
            position: absolute;
            top: calc(40% - 5px);
            left: 50%
        }

        .loader .bullet {
            position: absolute;
            padding: 5px;
            border-radius: 50%;
            background: #fff;
            -webkit-animation: animIn .65s ease-in-out 0s infinite;
            animation: animIn .65s ease-in-out 0s infinite
        }

        .loader .bullet:nth-child(1) {
            -webkit-animation-delay: 0s;
            animation-delay: 0s
        }

        .loader .bullet:nth-child(2) {
            -webkit-animation-delay: .15s;
            animation-delay: .15s
        }

        .loader .bullet:nth-child(3) {
            -webkit-animation-delay: .3s;
            animation-delay: .3s
        }

        .loader .bullet:nth-child(4) {
            -webkit-animation-delay: .45s;
            animation-delay: .45s
        }
        #containerRange .daterangepicker {
            position: relative !important;
            top: 0 !important;
            left: 0 !important;
        }
    </style>
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" />
</head>
<!-- END HEAD -->

<body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
<div class="page-wrapper">
    <!-- BEGIN HEADER -->
    <div class="page-header navbar navbar-fixed-top">
        <!-- BEGIN HEADER INNER -->
        <div class="page-header-inner ">
            <!-- BEGIN LOGO -->
            <div class="page-logo">
                <a href="{{url('/')}}">
                    <img src="{{ asset('../assets/layouts/layout/img/logo.png')}}" alt="logo" class="logo-default" /> </a>
                <div class="menu-toggler sidebar-toggler">
                    <span></span>
                </div>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN RESPONSIVE MENU TOGGLER -->
            <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
                <span></span>
            </a>
            <!-- END RESPONSIVE MENU TOGGLER -->
            <!-- BEGIN TOP NAVIGATION MENU -->
            <div class="top-menu">
                <ul class="nav navbar-nav pull-right">
                    <!-- BEGIN NOTIFICATION DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after "dropdown-extended" to change the dropdown styte -->
                    <!-- DOC: Apply "dropdown-hoverable" class after below "dropdown" and remove data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to enable hover dropdown mode -->
                    <!-- DOC: Remove "dropdown-hoverable" and add data-toggle="dropdown" data-hover="dropdown" data-close-others="true" attributes to the below A element with dropdown-toggle class -->
                    <!--<li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-bell"></i>
                            <span class="badge badge-default"> 7 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>
                                    <span class="bold">12 pending</span> notifications</h3>
                                <a href="page_user_profile_1.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">just now</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> New user registered. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 mins</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Server #12 overloaded. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">10 mins</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Server #2 not responding. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">14 hrs</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> Application error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">2 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Database overloaded 68%. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">3 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> A user IP blocked. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">4 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-warning">
                                                            <i class="fa fa-bell-o"></i>
                                                        </span> Storage Server #4 not responding dfdfdfd. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">5 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-info">
                                                            <i class="fa fa-bullhorn"></i>
                                                        </span> System Error. </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <span class="time">9 days</span>
                                            <span class="details">
                                                        <span class="label label-sm label-icon label-danger">
                                                            <i class="fa fa-bolt"></i>
                                                        </span> Storage server failed. </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>-->
                    <!-- END NOTIFICATION DROPDOWN -->
                    <!-- BEGIN INBOX DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!--<li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-envelope-open"></i>
                            <span class="badge badge-default"> 4 </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="external">
                                <h3>You have
                                    <span class="bold">7 New</span> Messages</h3>
                                <a href="app_inbox.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">Just Now </span>
                                                    </span>
                                            <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">16 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="../assets/layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Bob Nilson </span>
                                                        <span class="time">2 hrs </span>
                                                    </span>
                                            <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Lisa Wong </span>
                                                        <span class="time">40 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                                    <span class="photo">
                                                        <img src="../assets/layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                                            <span class="subject">
                                                        <span class="from"> Richard Doe </span>
                                                        <span class="time">46 mins </span>
                                                    </span>
                                            <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>-->
                    <!-- END INBOX DROPDOWN -->
                    <!-- BEGIN TODO DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <!--<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <i class="icon-calendar"></i>
                            <span class="badge badge-default"> 3 </span>
                        </a>
                        <ul class="dropdown-menu extended tasks">
                            <li class="external">
                                <h3>You have
                                    <span class="bold">12 pending</span> tasks</h3>
                                <a href="app_todo.html">view all</a>
                            </li>
                            <li>
                                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New release v1.2 </span>
                                                        <span class="percent">30%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Application deployment</span>
                                                        <span class="percent">65%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">65% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile app release</span>
                                                        <span class="percent">98%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">98% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Database migration</span>
                                                        <span class="percent">10%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">10% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Web server upgrade</span>
                                                        <span class="percent">58%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">58% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">Mobile development</span>
                                                        <span class="percent">85%</span>
                                                    </span>
                                            <span class="progress">
                                                        <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">85% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                                    <span class="task">
                                                        <span class="desc">New UI release</span>
                                                        <span class="percent">38%</span>
                                                    </span>
                                            <span class="progress progress-striped">
                                                        <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">38% Complete</span>
                                                        </span>
                                                    </span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>-->
                    <!-- END TODO DROPDOWN -->
                    <!-- BEGIN USER LOGIN DROPDOWN -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                            <img alt="" class="img-circle" src="https://pbs.twimg.com/profile_images/748905631713603584/9l8RG7in.jpg" />
                            <span class="username username-hide-on-mobile"> Evolve </span>
                        </a>
                    </li>
                    <!-- END USER LOGIN DROPDOWN -->
                    <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                    <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                    <li class="dropdown dropdown-quick-sidebar-toggler">
                        <a href="{{ url('/logout') }}" class="dropdown-toggle">
                            <i class="icon-logout"></i>
                        </a>
                    </li>
                    <!-- END QUICK SIDEBAR TOGGLER -->
                </ul>
            </div>
            <!-- END TOP NAVIGATION MENU -->
        </div>
        <!-- END HEADER INNER -->
    </div>
    <!-- END HEADER -->
    <!-- BEGIN HEADER & CONTENT DIVIDER -->
    <div class="clearfix"> </div>
    <!-- END HEADER & CONTENT DIVIDER -->
    <!-- BEGIN CONTAINER -->
    <div class="page-container">
        <!-- BEGIN SIDEBAR -->
        <div class="page-sidebar-wrapper">
            <!-- BEGIN SIDEBAR -->
            <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
            <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
            <div class="page-sidebar navbar-collapse collapse">
                <!-- BEGIN SIDEBAR MENU -->
                <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                    <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                    <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                    <li class="sidebar-toggler-wrapper hide">
                        <div class="sidebar-toggler">
                            <span></span>
                        </div>
                    </li>
                    <li class="heading">
                        <h3 class="uppercase">Reportes</h3>
                    </li>
                    <li class="nav-item start {{ Request::is('reportes') ? 'active open' : '' }}">
                        <a href="{{ url('/reportes') }}" class="nav-link nav-toggle">
                            <i class="icon-home"></i>
                            <span class="title">Reporteador</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <!--<li class="heading">
                        <h3 class="uppercase">Administracion</h3>
                    </li>
                    <li class="nav-item  ">
                        <a href="javascript:;" class="nav-link nav-toggle">
                            <i class="icon-diamond"></i>
                            <span class="title">Catalogos</span>
                            <span class="arrow"></span>
                        </a>
                    </li>-->
                </ul>
                <!-- END SIDEBAR MENU -->
                <!-- END SIDEBAR MENU -->
            </div>
            <!-- END SIDEBAR -->
        </div>
        <!-- END SIDEBAR -->
        <!-- BEGIN CONTENT -->
        <div class="page-content-wrapper">
            <!-- BEGIN CONTENT BODY -->
            <div class="page-content">
                <div class="filtros">
                    <img id="imgFiltro" height="50" width="50" src="https://cdn0.iconfinder.com/data/icons/ui-icon-part-2/128/navigation_2-512.png" data-toggle="modal" data-target="#modalFiltros">
                </div>
                @yield('content')
                <!-- Modal -->
                <div class="modal fade" id="modalFiltros" tabindex="-1" role="dialog" aria-labelledby="modalFiltrosLabel">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="modalFiltrosLabel">Filtros para consulta</h4>
                            </div>
                            <form class="form" role="form">
                                {{ csrf_field() }}
                                <div class="modal-body">
                                    <h1 class="page-title text-center"> Reporteador
                                    </h1>
                                    <div class="row">
                                        <div id="filtrosGenerales">
                                            <div class="col-md-offset-3 col-md-2 col-sm-2 col-xs-6 filtroPedidos">
                                                <div class="color-demo" data-original-title="Click to view demos for this color" data-toggle="modal" data-target="#demo_modal_white">
                                                    <div class="color-view bg-red-flamingo bg-font-red-flamingo bold uppercase"><i class="icon-book-open"></i></div>
                                                    <div class="color-info bg-white c-font-14 sbold"> Productos </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6 filtroClientes">
                                                <div class="color-demo" data-original-title="Click to view demos for this color" data-toggle="modal" data-target="#demo_modal_white">
                                                    <div class="color-view bg-blue bg-font-blue bold uppercase"><i class="icon-user"></i></div>
                                                    <div class="color-info bg-white c-font-14 sbold"> Clientes </div>

                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6 filtroFecha">
                                                <div class="color-demo" data-original-title="Click to view demos for this color" data-toggle="modal" data-target="#demo_modal_white">
                                                    <div class="color-view bg-yellow-soft bg-font-yellow-soft bold uppercase"><i class="icon-calendar"></i></div>
                                                    <div class="color-info bg-white c-font-14 sbold"> Fecha </div>
                                                </div>
                                            </div>
                                            <!--<div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="color-demo" data-original-title="Click to view demos for this color" data-toggle="modal" data-target="#demo_modal_white">
                                                    <div class="color-view bg-red-pink bg-font-red-pink bold uppercase"><i class="icon-map"></i></div>
                                                    <div class="color-info bg-white c-font-14 sbold"> Estados </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-6">
                                                <div class="color-demo" data-original-title="Click to view demos for this color" data-toggle="modal" data-target="#demo_modal_white">
                                                    <div class="color-view bg-green-steel bg-font-green-steel bold uppercase"><i class="icon-user-following"></i></div>
                                                    <div class="color-info bg-white c-font-14 sbold"> Equipos </div>
                                                </div>
                                            </div>-->
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-md-12 contenedorPedidos">
                                            <div class="portlet box blue-dark ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i> Filtro de consulta General</div>
                                                    <div class="tools">
                                                        <a href="#" class="collapse" data-original-title="" title=""> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                                        <a href="#" class="reload" data-original-title="" title=""> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                        <div class="form-body">
                                                            <div class="form-group col-md-3">
                                                                <label>Marca</label>
                                                                <select id="select2-marca" name="marca[]" id="marca" class="form-control select2-marca" style="width: 100%" multiple>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label>Departamento</label>
                                                                <select id="select2-departamento" name="departamento[]" class="form-control select2-departamento" style="width:200px;" multiple>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label>Categoria</label>
                                                                <select id="select2-categoria" name="categoria[]" class="form-control select2-categoria" style="width:200px;" multiple>
                                                                </select>
                                                            </div>

                                                            <div class="form-group col-md-3">
                                                                <label>Presentación</label>
                                                                <select id="select2-presentacion" name="presentacion[]" class="form-control select2-presentacion" style="width:200px;" multiple>
                                                                </select>
                                                            </div>

                                                            <div class="clearfix"></div>

                                                            <div class="form-group col-md-6">
                                                                <label>Productos</label>
                                                                <select id="select2-productos" name="productos[]" class="form-control select2-productos" style="width:200px;" multiple>
                                                                </select>
                                                            </div>

                                                        </div>
                                                        <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 contenedorClientes" style="display:none;">
                                            <div class="portlet box blue ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i> Filtro de Cliente</div>
                                                    <div class="tools">
                                                        <a href="#" class="collapse" data-original-title="" title=""> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                                        <a href="#" class="reload" data-original-title="" title=""> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <div class="form-body">
                                                        <div class="form-group col-md-3">
                                                            <label>Grupo</label>
                                                            <select id="select2-grupo" name="grupo[]" id="grupo" class="form-control select2-grupo" style="width: 100%" multiple>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label>Formato</label>
                                                            <select id="select2-formato" name="formato[]" class="form-control select2-formato" style="width:200px;" multiple>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label>Cadena</label>
                                                            <select id="select2-cadena" name="cadena[]" class="form-control select2-cadena" style="width:200px;" multiple>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-md-3">
                                                            <label>Sucursal</label>
                                                            <select id="select2-sucursal" name="sucursal[]" class="form-control select2-sucursal" style="width:200px;" multiple>
                                                            </select>
                                                        </div>

                                                        <div class="clearfix"></div>

                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12 contenedorFecha" style="display:none;">
                                            <div class="portlet box yellow-soft ">
                                                <div class="portlet-title">
                                                    <div class="caption">
                                                        <i class="fa fa-gift"></i> Filtro por Fecha</div>
                                                    <div class="tools">
                                                        <a href="#" class="collapse" data-original-title="" title=""> </a>
                                                        <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                                                        <a href="#" class="reload" data-original-title="" title=""> </a>
                                                    </div>
                                                </div>
                                                <div class="portlet-body form">
                                                    <div class="form-body">
                                                        <div class="col-md-12">
                                                            <label>Rango de Fecha</label>
                                                            <input type="text" name="rangoFecha" id="rangoFecha" class="daterange" size="25" value="{{date('d-m-Y')}}" />
                                                            <div id="containerRange"></div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" name="btnbusqueda" id="btnbusqueda" class="btn green">Consultar</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END CONTENT BODY -->
        </div>
        <!-- END CONTENT -->
    </div>
    <!-- END CONTAINER -->
    <!-- BEGIN FOOTER -->
    <div class="page-footer">
        <div class="page-footer-inner"> 2016 &copy; Evolve
        </div>
        <div class="scroll-to-top">
            <i class="icon-arrow-up"></i>
        </div>
    </div>
    <!-- END FOOTER -->
</div>
<!-- BEGIN QUICK NAV
<nav class="quick-nav">
    <a class="quick-nav-trigger" href="#0">
        <span aria-hidden="true"></span>
    </a>
    <ul>
        <li>
            <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank" class="active">
                <span>Purchase Metronic</span>
                <i class="icon-basket"></i>
            </a>
        </li>
        <li>
            <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/reviews/4021469?ref=keenthemes" target="_blank">
                <span>Customer Reviews</span>
                <i class="icon-users"></i>
            </a>
        </li>
        <li>
            <a href="http://keenthemes.com/showcast/" target="_blank">
                <span>Showcase</span>
                <i class="icon-user"></i>
            </a>
        </li>
        <li>
            <a href="http://keenthemes.com/metronic-theme/changelog/" target="_blank">
                <span>Changelog</span>
                <i class="icon-graph"></i>
            </a>
        </li>
    </ul>
    <span aria-hidden="true" class="quick-nav-bg"></span>
</nav>
<div class="quick-nav-overlay"></div>
<!-- END QUICK NAV -->
<!--[if lt IE 9]>
<script src="{{ asset('../assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('../assets/global/plugins/excanvas.min.js') }}"></script>
<script src="{{ asset('../assets/global/plugins/ie8.fix.min.js') }}"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('../assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('../assets/global/plugins/moment.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/morris/raphael-min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/amcharts/amcharts/amcharts.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/amcharts/amcharts/serial.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/amcharts/amcharts/pie.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/amcharts/amcharts/radar.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/amcharts/amcharts/themes/light.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/amcharts/amcharts/themes/patterns.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/amcharts/amcharts/themes/chalk.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/amcharts/ammap/ammap.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/amcharts/ammap/maps/js/worldLow.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/amcharts/amstockcharts/amstock.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/fullcalendar/fullcalendar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/horizontal-timeline/horizontal-timeline.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/flot/jquery.flot.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/flot/jquery.flot.resize.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/flot/jquery.flot.categories.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.russia.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.world.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.europe.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.germany.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jqvmap/jqvmap/maps/jquery.vmap.usa.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/global/plugins/jqvmap/jqvmap/data/jquery.vmap.sampledata.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('../assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('../assets/pages/scripts/dashboard.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('../assets/layouts/layout/scripts/layout.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/layouts/layout/scripts/demo.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/layouts/global/scripts/quick-sidebar.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('../assets/layouts/global/scripts/quick-nav.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('../assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    var token = $("#_token").val();
</script>
@yield('javascript')
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2-marca').select2({
            language: "es",
            ajax: {
                url: "{{ url('/ajax/comboMarca') }}",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: $.map(data.marca, function (item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        })
                    };
                },
            },
            escapeMarkup: function (markup) { return markup; }
        });
        $('.select2-departamento').select2({
            language: "es",
            ajax: {
                url: "{{ url('/ajax/comboDepartamento') }}",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: $.map(data.departamento, function (item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        })
                    };
                },
            },
            escapeMarkup: function (markup) { return markup; }
        });
        $('.select2-categoria').select2({
            language: "es",
            ajax: {
                url: "{{ url('/ajax/comboCategoria') }}",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: $.map(data.categoria, function (item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        })
                    };
                },
            },
            escapeMarkup: function (markup) { return markup; }
        });
        $('.select2-presentacion').select2({
            language: "es",
            ajax: {
                url: "{{ url('/ajax/comboPresentacion') }}",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: $.map(data.presentacion, function (item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        })
                    };
                },
            },
            escapeMarkup: function (markup) { return markup; }
        });
        $('.select2-productos').select2({
            language: "es",
            ajax: {
                url: "{{ url('/ajax/comboProductos') }}",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: $.map(data.productos, function (item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        })
                    };
                },
            },
            escapeMarkup: function (markup) { return markup; }
        });
        $('.select2-grupo').select2({
            language: "es",
            ajax: {
                url: "{{ url('/ajax/comboGrupo') }}",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: $.map(data.grupo, function (item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        })
                    };
                },
            },
            escapeMarkup: function (markup) { return markup; }
        });
        $('.select2-formato').select2({
            language: "es",
            ajax: {
                url: "{{ url('/ajax/comboFormato') }}",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: $.map(data.formato, function (item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        })
                    };
                },
            },
            escapeMarkup: function (markup) { return markup; }
        });
        $('.select2-cadena').select2({
            language: "es",
            ajax: {
                url: "{{ url('/ajax/comboCadena') }}",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: $.map(data.cadena, function (item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        })
                    };
                },
            },
            escapeMarkup: function (markup) { return markup; }
        });
        $('.select2-sucursal').select2({
            language: "es",
            ajax: {
                url: "{{ url('/ajax/comboSucursal') }}",
                type: 'POST',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        term: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: $.map(data.sucursal, function (item) {
                            return {
                                text: item.nombre,
                                id: item.id
                            }
                        })
                    };
                },
            },
            escapeMarkup: function (markup) { return markup; }
        });
        $('.daterange').daterangepicker({
            doneButtonText: 'Aceptar',
            locale: {
                format: 'DD/MM/YYYY'
            },
            ranges: {
                'Hoy': [moment(), moment()],
                'Ayer': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Ultimos 7 Dias': [moment().subtract(6, 'days'), moment()],
                'Ultimos 30 Dias': [moment().subtract(29, 'days'), moment()],
                'Este Mes': [moment().startOf('month'), moment().endOf('month')],
                'Ultimo Mes': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });
        $(".daterangepicker").appendTo('#containerRange');
        $( ".filtroPedidos" ).click(function() {
            $(".contenedorPedidos").show();
            $(".contenedorClientes").hide();
            $(".contenedorFecha").hide();
        });
        $( ".filtroClientes" ).click(function() {
            $(".contenedorPedidos").hide();
            $(".contenedorClientes").show();
            $(".contenedorFecha").hide();
        });
        $( ".filtroFecha" ).click(function() {
            $(".contenedorPedidos").hide();
            $(".contenedorClientes").hide();
            $(".contenedorFecha").show();
        });
    });
    function spinner (id) {
        $("#spinner_"+id).empty();
        var html =      '<div class="backspin">'
                            + '<div class="loader">'
                                + '<div class="bullet"></div>'
                                + '<div class="bullet"></div>'
                                + '<div class="bullet"></div>'
                            + '<div class="bullet"></div>'
                            + '</div>'
                            + '<div class="loading">'
                                + '<span>C</span><span>A</span><span>R</span><span>G</span><span>A</span><span>N</span><span>D</span><span>O</span>'
                            + '</div>'
                        + '</div>';
        $("#spinner_"+id).append(html);
        $("#spinner_"+id).show();
    }
</script>
</body>
</html>