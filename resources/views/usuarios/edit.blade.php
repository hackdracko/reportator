@extends('layouts.master')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('/retail/usuarios/') }}">Usuarios</a>
                <i class="fa fa-circle"></i>
                <li>
                    <span>Edición</span>
                </li>
            </li>
        </ul>
    </div>
    <h1 class="page-title text-center"> Edición del Usuario <b>{{ $user->name }}</b>
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
                        <span class="caption-subject bold uppercase"> Edición de Usuario</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form action="{{ url('/retail/usuarios/'.$user->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-body">
                            <div class="form-group">
                                <label>Nombre</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $user->name }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-envelope"></i>
                                    </span>
                                    <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control" name="password" id="password" value="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Repite Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-key"></i>
                                    </span>
                                    <input type="password" class="form-control" name="rpassword" id="rpassword" value="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Asignar Cuenta</label>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-user"></i>
                                    </span>
                                    <select name="cuenta">
                                        <option value="0">Selecciona</option>
                                        @foreach($cuentas as $cuenta)
                                            <option value="{{$cuenta->id}}" {{($user->cuenta==$cuenta->id) ? 'selected' : ''}}>{{$cuenta->nombreProyecto}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Estatus</label>
                                <div class="input-group">
                                    <select name="estatus" class="form-control">
                                        <option value="1" {{($user->estatus==1) ? 'selected' : ''}}>Activo</option>
                                        <option value="0" {{($user->estatus==0) ? 'selected' : ''}}>Inactivo</option>
                                    </select>
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