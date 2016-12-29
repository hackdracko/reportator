@extends('layouts.master')

@section('content')
    <div class="page-bar">
        <ul class="page-breadcrumb">
            <li>
                <a href="{{ url('/perfil') }}">Mi Perfil</a>
                <i class="fa fa-circle"></i>
            </li>
        </ul>
    </div>

    <div class="row">
        <form action="{{ url('/bodega/usuarios/'.$user->id) }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT">
            <div class="col-md-6 col-md-offset-3">
                <fieldset class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{ $user->name }}">
                </fieldset>
                <fieldset class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{ $user->email }}">
                </fieldset>
                <fieldset class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" value="">
                </fieldset>
                <fieldset class="form-group">
                    <label for="rpassword">Repite el Password</label>
                    <input type="password" class="form-control" name="rpassword" id="rpassword">
                </fieldset>
            </div>
        </form>
    </div>
@endsection