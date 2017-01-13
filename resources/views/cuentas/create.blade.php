@extends('layouts.master')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('/retail/usuarios/') }}">Usuarios</a>
                <i class="fa fa-circle"></i>
            <li>
                <span>Alta</span>
            </li>
            </li>
        </ul>
    </div>
    <h1 class="page-title text-center"> Creación de Usuario
    </h1>
    <div class="row">
        <div class="col-md-offset-1 col-md-10">
            @if ($errors->has())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif
            @if (Session::has('message'))
                <div class="alert alert-{{ Session::get('message')[0] }} alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ Session::get('message')[1] }}
                </div>
            @endif
        <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">
                <div class="portlet-title">
                    <div class="caption font-yellow-gold">
                        <i class="icon-settings font-yellow-gold"></i>
                        <span class="caption-subject bold uppercase"> Creación de Usuario</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ url('/retail/usuarios') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <div class="form-body">
                            <div class="form-group">
                                <label>Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="text" class="form-control" name="email" id="email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control" name="password" id="password" value="{{old('password')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Repite Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control" name="rpassword" id="rpassword" value="{{old('rpassword')}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" class="btn blue">Guardar</button>
                            <button type="button" class="btn default">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection