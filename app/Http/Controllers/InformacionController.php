<?php

namespace App\Http\Controllers;

use App\Cuenta;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Auth as User;

class InformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::user();
        $cuentas = Cuenta::where('idProyecto',$user->cuenta)->paginate(20);
        return view('informacion.index')->withCuentas($cuentas);
    }
    public function fechas(Request $request, $id)
    {
        if ($request->isMethod('get'))
        {
            return view('informacion.fecha', ['idCuenta' => $id])
                ->withFechas(array())
                ->withFaltantes(array());
        }else{
            $finicial = $request->finicial;
            $ffinal = $request->ffinal;
            $fechasFormulario = $this->betweenDates($finicial, $ffinal);
            $cuenta = Cuenta::findOrFail($id);
            $database = strtolower($cuenta->nombreProyecto);
            $query = DB::connection($database)
                ->table('concentradov')
                ->whereBetween('fecha', [$finicial, $ffinal])
                ->groupBy('fecha')
                ->get();
            $fechasConsulta = array();
            foreach ($query as $fechaQuery){
                $fechasConsulta[] = $fechaQuery->fecha;
            }
            $fechasSinInfo = array_diff($fechasFormulario, $fechasConsulta);
            return view('informacion.fecha', ['idCuenta' => $id])
                ->withFechas($fechasFormulario)
                ->withFaltantes($fechasSinInfo);

        }
        /*$dates = $this->betweenDates("2017-01-01", "2017-02-01");
        dd($dates);*/
    }
    public function descargaRobot(Request $request){
        $finicial = $request->finicial;
        $ffinal = $request->ffinal;

    }
    function betweenDates($strDateFrom,$strDateTo)
    {
        // takes two dates formatted as YYYY-MM-DD and creates an
        // inclusive array of the dates between the from and to dates.

        // could test validity of dates here but I'm already doing
        // that in the main script

        $aryRange=array();

        $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
        $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

        if ($iDateTo>=$iDateFrom)
        {
            array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry
            while ($iDateFrom<$iDateTo)
            {
                $iDateFrom+=86400; // add 24 hours
                array_push($aryRange,date('Y-m-d',$iDateFrom));
            }
        }
        return $aryRange;
    }
}
