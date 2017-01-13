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
<hr>
    <div class="row">
        <form action="{{ url('/retail/informacion/fechas/'.$idCuenta) }}" method="post">
            {{ csrf_field() }}
            <div class="col-md-12">
                <div class="col-md-6 text-center">
                    <label for="finicial">Fecha Inicial:</label>
                    <input type="text" name="finicial" id="finicial" class="datepicker" value="2015-05-20">
                </div>
                <div class="col-md-6 text-center">
                    <label for="finicial">Fecha Final:</label>
                    <input type="text" name="ffinal" id="ffinal" class="datepicker" value="2015-06-30">
                </div>
            </div>
            <div class="form-actions text-center">
                <button type="submit" class="btn blue">Ver Información</button>
            </div>
        </form>
        <hr>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">No.</th>
                    <th class="text-center">Fecha</th>
                    <th class="text-center">Estatus</th>
                    <th class="text-center">Descargar</th>
                </tr>
            </thead>
            <tbody>
            <?php $x = 1; ?>
            @foreach($fechas as $fecha)
                <tr>
                    <td>{{$x}}</td>
                    <td>{{$fecha}}</td>
                    @foreach($faltantes as $faltante)
                        <?php $texto = "Existe"; ?>
                        <?php $color = "alert-success"; ?>
                        <?php $bandera = 1; ?>
                        @if($fecha == $faltante)
                            <?php $texto = "No existe"; ?>
                            <?php $color = "alert-danger"; ?>
                            <?php $bandera = 0; ?>
                            @break
                        @endif
                    @endforeach
                    <td class="{{$color}}">{{$texto}}</td>
                    @if($bandera == 0)
                        <td class="text-center"><a href="#" onclick="descargaRobot()">Descargar Información</a></td>
                    @endif
                </tr>
                <?php $x++; ?>
            @endforeach
            </tbody>

        </table>
    </div>
    <script type="text/javascript">
        function descargaRobot() {
            var finicial = $('#finicial').val();
            var ffinal = $('#ffinal').val();
            var datos = {
                finicial: finicial,
                ffinal: ffinal
            };
            var jqxhr = $.post( "{{ url('/retail/informacion/descargaRobot') }}", datos, function(data) {
                console.log("Termine de Generar el excel");
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
@endsection