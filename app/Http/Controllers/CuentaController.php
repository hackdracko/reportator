<?php

namespace App\Http\Controllers;


use App\Cuenta;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Auth as User;

class CuentaController extends Controller
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
        return view('cuentas.index')->withCuentas($cuentas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $cuenta = Cuenta::findOrFail($id);
        return view("cuentas.edit")->withCuenta($cuenta);
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
        $cuenta = Cuenta::find($id);
        $validator = Validator::make($request->all(), [
            'usuario' => 'required',
            'password' => 'required',
        ]);


        if ($validator->fails()) {
            return redirect('/retail/cuentas/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }else{
            $cuenta->usuario = $request->usuario;
            $cuenta->password = $request->password;
            $cuenta->activo = $request->estatus;
            $cuenta->save();
            Session::flash('message', array('info','Las credenciales se cambiaron correctamente.'));
            return Redirect::to('/retail/cuentas/'.$id.'/edit');
        }
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

    public function logicaldelete($id)
    {
        $cuenta = Cuenta::find($id);
        $cuenta->activo = 0;
        $cuenta->save();
        Session::flash('message', array('info','La cuenta se Inactivo Correctamente.'));
        return Redirect::to('/retail/cuentas');
    }
}
