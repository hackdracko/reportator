<?php

namespace App\Http\Controllers;

use App\Catproducto;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
ini_set('memory_limit', '2048M');
class AjaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function comboMarca(Request $request)
    {
        //dd($request->term);
        $res = DB::connection('spinmaster')
            ->table('catproductos')
            ->join('catxdivision', 'catproductos.division', '=', 'catxdivision.id')
            ->groupBy('catproductos.division')
            ->orderBy('catxdivision.nombre')
            ->select('catxdivision.id', 'catxdivision.nombre')
            ->get();
        return response()
                ->json(['marca' => $res]);
    }
    public function comboDepartamento(Request $request)
    {
        //dd($request->term);
        $res = DB::connection('spinmaster')
            ->table('catproductos')
            ->join('catxcategoria', 'catproductos.categoria', '=', 'catxcategoria.id')
            ->groupBy('catproductos.categoria')
            ->orderBy('catxcategoria.nombre')
            ->select('catxcategoria.id', 'catxcategoria.nombre')
            ->get();
        return response()
            ->json(['departamento' => $res]);
    }
    public function comboCategoria(Request $request)
    {
        //dd($request->term);
        $res = DB::connection('spinmaster')
            ->table('catproductos')
            ->join('catxsubcategoria', 'catproductos.subcategoria', '=', 'catxsubcategoria.id')
            ->groupBy('catproductos.subcategoria')
            ->orderBy('catxsubcategoria.nombre')
            ->select('catxsubcategoria.id', 'catxsubcategoria.nombre')
            ->get();
        return response()
            ->json(['categoria' => $res]);
    }
    public function comboPresentacion(Request $request)
    {
        //dd($request->term);
        $res = DB::connection('spinmaster')
            ->table('catproductos')
            ->join('catxmodelo', 'catproductos.modelo', '=', 'catxmodelo.id')
            ->groupBy('catproductos.modelo')
            ->orderBy('catxmodelo.nombre')
            ->select('catxmodelo.id', 'catxmodelo.nombre')
            ->get();
        return response()
            ->json(['presentacion' => $res]);
    }
    public function comboProductos(Request $request)
    {
        //dd($request->term);
        $res = Catproducto::
                where('nombre', 'like', '%'.$request->term.'%')
                ->orderBy('nombre', 'asc')
                ->get();
        return response()
            ->json(['productos' => $res]);
    }
    public function comboGrupo(Request $request)
    {
        //dd($request->term);
        $res = DB::connection('spinmaster')
            ->table('cattiendas')
            ->join('catxgrupo', 'cattiendas.grupo', '=', 'catxgrupo.id')
            ->groupBy('cattiendas.grupo')
            ->orderBy('catxgrupo.nombre')
            ->select('catxgrupo.id', 'catxgrupo.nombre')
            ->get();
        return response()
            ->json(['grupo' => $res]);
    }
    public function comboFormato(Request $request)
    {
        //dd($request->term);
        $res = DB::connection('spinmaster')
            ->table('cattiendas')
            ->join('catxformato', 'cattiendas.formato', '=', 'catxformato.id')
            ->groupBy('cattiendas.formato')
            ->orderBy('catxformato.nombre')
            ->select('catxformato.id', 'catxformato.nombre')
            ->get();
        return response()
            ->json(['formato' => $res]);
    }
    public function comboCadena(Request $request)
    {
        //dd($request->term);
        $res = DB::connection('spinmaster')
            ->table('cattiendas')
            ->join('catxcadena', 'cattiendas.cadena', '=', 'catxcadena.id')
            ->groupBy('cattiendas.cadena')
            ->orderBy('catxcadena.nombre')
            ->select('catxcadena.id', 'catxcadena.nombre')
            ->get();
        return response()
            ->json(['cadena' => $res]);
    }
    public function comboSucursal(Request $request)
    {
        //dd($request->term);
        $res = DB::connection('spinmaster')
            ->table('cattiendas')
            ->join('catxcadena', 'cattiendas.cadena', '=', 'catxcadena.id')
            ->orderBy('catxcadena.nombre')
            ->select('cattiendas.id', DB::raw('CONCAT(catxcadena.nombre, "-" ,cattiendas.sucursal) as nombre'))
            ->get();
        return response()
            ->json(['sucursal' => $res]);
    }
    public function busqueda(Request $request)
    {
        $marcas = $request->marca;
        $departamentos = $request->departamento;
        $categorias = $request->categoria;
        $presentaciones = $request->presentacion;
        $productos = $request->productos;
        $accion = $request->accion;
        $arrayMarcas = array();

        //REALIZA CONSULTA A LA TABLA CATPRODUCTOS

        $queryProductos = DB::connection('spinmaster')
            ->table('catproductos')
            ->when($marcas, function ($query) use ($marcas) {
                return $query->whereIn('division', $marcas);
            })
            ->when($departamentos, function ($query) use ($departamentos) {
                return $query->whereIn('categoria', $departamentos);
            })
            ->when($categorias, function ($query) use ($categorias) {
                return $query->whereIn('subcategoria', $categorias);
            })
            ->when($presentaciones, function ($query) use ($presentaciones) {
                return $query->whereIn('modelo', $presentaciones);
            })
            ->when($productos, function ($query) use ($productos) {
                return $query->whereIn('id', $productos);
            })
            ->distinct()
            ->get();

        foreach ($queryProductos as $chksump){
            $chksumArray[] = $chksump->chksum;
        }
        $queryConcentradov = DB::connection('spinmaster')
            ->table('concentradov');
            if($productos){
                $queryConcentradov->whereIn('idProducto', $productos);
            }else{
                $queryConcentradov->whereIn('chksump', $chksumArray);
            }
            if($accion == 'marca'){
                $queryConcentradov->groupBy('division')
                ->join('catxdivision', 'concentradov.division', '=', 'catxdivision.id')
                ->select('catxdivision.id as id', 'catxdivision.nombre as nombre', DB::raw('count(*) as count'));
            }
            if($accion == 'departamento'){
                $queryConcentradov->groupBy('categoria')
                    ->join('catxcategoria', 'concentradov.categoria', '=', 'catxcategoria.id')
                    ->select('catxcategoria.id as id', 'catxcategoria.nombre as nombre', DB::raw('count(*) as count'));
            }
            if($accion == 'categoria'){
                $queryConcentradov->groupBy('subcategoria')
                    ->join('catxsubcategoria', 'concentradov.subcategoria', '=', 'catxsubcategoria.id')
                    ->select('catxsubcategoria.id as id', 'catxsubcategoria.nombre as nombre', DB::raw('count(*) as count'));
            }
            if($accion == 'presentacion'){
                $queryConcentradov->groupBy('modelo')
                    ->join('catxmodelo', 'concentradov.modelo', '=', 'catxmodelo.id')
                    ->select('catxmodelo.id as id', 'catxmodelo.nombre as nombre', DB::raw('count(*) as count'));
            }
            if($accion == 'producto'){
                $queryConcentradov
                    ->groupBy('idProducto')
                    ->join('catproductos', 'concentradov.idProducto', '=', 'catproductos.id')
                    ->select('catproductos.id as id', 'catproductos.nombre as nombre', DB::raw('count(*) as count'));
            }
        $queryConcentradov->whereBetween('fecha', [$request->fechaS, $request->fechaF]);
        return response()
            ->json(['resultado' => $queryConcentradov->get()]);
    }
}