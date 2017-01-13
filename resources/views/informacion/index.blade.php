@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h3>Administración de Cuentas</h3>
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
                    <th class="text-center">Proyecto</th>
                    <th class="text-center">Cadena</th>
                    <th class="text-center">Usuario</th>
                    <th class="text-center">Password</th>
                    <th class="text-center">Estatus</th>
                    <th class="text-center">Ver</th>
                </tr>
                </thead>
                <tbody>

                @foreach ($cuentas as $cuenta)
                    <tr>
                        <td class="table-text text-center">{{ $cuenta->nombreProyecto }}</td>
                        <td class="table-text text-center">{{ $cuenta->nombreCadena }}</td>
                        <td class="table-text text-center">{{ $cuenta->usuario }}</td>
                        <td class="table-text text-center">{{ $cuenta->password }}</td>
                        @if ($cuenta->activo == 1)
                            <td class="table-text text-center"><span class="fa fa-check text-success"></span></td>
                        @else
                            <td class="table-text text-center"><span class="fa fa-times-circle text-danger"></span></td>
                        @endif
                        <td class="table-text text-center">
                            <a style="cursor: pointer;" href="{{ url('/retail/informacion/fechas/'.$cuenta->id) }}">
                                <i class="fa fa-edit text-info"></i>
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
                    @if ($cuentas->previousPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $cuentas->previousPageUrl() }}" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                    @endif
                    @for ($i = 1; $i <= $cuentas->lastPage(); $i++)
                        @if ($cuentas->currentPage() == $i )
                            <li class="page-item active">
                                <a class="page-link" href="#">{{ $cuentas->currentPage() }}
                                </a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $cuentas->url($i) }}">
                                    {{ $i }}
                                </a>
                            </li>
                        @endif
                    @endfor
                    @if ($cuentas->nextPageUrl())
                        <li class="page-item">
                            <a class="page-link" href="{{ $cuentas->nextPageUrl() }}" aria-label="Next">
                                <span aria-hidden="true">»</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
@endsection