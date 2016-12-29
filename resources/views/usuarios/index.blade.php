@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Administración de Usuarios</h3>
                        <small>Mostrando 20 registros</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @if (Session::has('message'))
            <div class="alert alert-{{ Session::get('message')[0] }} alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ Session::get('message')[1] }}
            </div>
        @endif
        <div class="col-md-12 text-center">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Fecha Registro</th>
                    <th class="text-center">Fecha Actualización</th>
                    <th class="text-center">Estatus</th>
                    <th class="text-center">Acciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($users as $user)
                    <tr>
                        <td class="table-text text-center">{{ $user->name }}</td>
                        <td class="table-text text-center">{{ $user->email }}</td>
                        <td class="table-text text-center">{{ $user->created_at }}</td>
                        <td class="table-text text-center">{{ $user->updated_at }}</td>
                        @if ($user->estatus == 1)
                            <td class="table-text text-center"><span class="fa fa-check text-success"></span></td>
                        @else
                            <td class="table-text text-center"><span class="fa fa-times-circle text-danger"></span></td>
                        @endif
                        <td class="table-text text-center">
                            <a style="cursor: pointer;" href="{{ url('/retail/usuarios/'.$user->id.'/edit') }}">
                                <i class="fa fa-edit text-info"></i>
                            </a>
                            <a style="cursor: pointer;" href="{{ url('/retail/usuarios/logicaldelete/'.$user->id) }}">
                                <i class="fa fa-trash text-danger"></i>
                            </a>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-12 text-center">
            <nav>
                <ul class="pagination">
                    @if ($users->previousPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @endif
                    @for ($i = 1; $i <= $users->lastPage(); $i++)
                        @if ($users->currentPage() == $i )
                            <li class="page-item active">
                                <a class="page-link" href="#">{{ $users->currentPage() }}
                                </a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $users->url($i) }}">
                                    {{ $i }}
                                </a>
                            </li>
                        @endif
                    @endfor
                    @if ($users->nextPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $users->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        <div class="col-md-12">
            <form action="{{ url('/retail/usuarios/create') }}" method="GET" class="form-horizontal">
                <button class="btn btn-success">Agregar Nuevo Usuario <i class="fa fa-plus-circle"></i></button>
            </form>
        </div>
    </div>
@endsection