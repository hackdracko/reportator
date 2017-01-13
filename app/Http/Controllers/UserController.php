<?php

namespace App\Http\Controllers;

use App\Cuenta;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(20);
        return view('usuarios.index')->withUsers($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cuentas = Cuenta::select('id', 'nombreProyecto')
                            ->orderBy('nombreProyecto')
                            ->groupBy('nombreProyecto');
        return view('usuarios.create')->withCuentas($cuentas->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'rpassword' => 'required',
            'cuenta' => 'required|not_in:0',
        ]);

        if ($validator->fails()) {
            return redirect('/retail/usuarios/create')
                ->withErrors($validator)
                ->withInput();
        }else{
            $name = $request->nombre;
            $email = $request->email;
            $cuenta = $request->cuenta;
            if($request->password != $request->rpassword){
                Session::flash('message', array('danger','El Password y Repite Password deben ser iguales'));
                return Redirect::to('/retail/usuarios/create')->withInput();
            }else {
                $password = $request->password;
            }
            $user = new User();
            $user->name = $name;
            $user->email = $email;
            $user->password = Hash::make($password);
            $user->cuenta = $cuenta;
            $user->save();
            Session::flash('message', array('info','El Usuario se Guardo Correctamente.'));
            return Redirect::to('/retail/usuarios');
        }
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
        $cuentas = Cuenta::select('id', 'nombreProyecto')
            ->orderBy('nombreProyecto')
            ->groupBy('nombreProyecto');
        $user = User::findOrFail($id);
        return view("usuarios.edit")
                ->withUser($user)
                ->withCuentas($cuentas->get());
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
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'rpassword' => 'required',
            'cuenta' => 'required|not_in:0',
        ]);


        if ($validator->fails()) {
            return redirect('/retail/usuarios/'.$id.'/edit')
                ->withErrors($validator)
                ->withInput();
        }else{
            $user->name = $request->nombre;
            $user->email = $request->email;
            $user->cuenta = $request->cuenta;
            $user->estatus = $request->estatus;
            if($request->password != 'password'){
                if($request->password != $request->rpassword){
                    Session::flash('message', array('danger','El Password y Repite Password deben ser iguales'));
                    return Redirect::to('/retail/usuarios/'.$id.'/edit');
                }else {
                    $user->password = Hash::make($request->password);
                }
            }
            $user->save();
            Session::flash('message', array('info','El Usuario se Edito Correctamente.'));
            return Redirect::to('/retail/usuarios/'.$id.'/edit');
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
        $user = User::find($id);
        $user->estatus = 0;
        $user->save();
        Session::flash('message', array('info','El Usuario se Inactivo Correctamente.'));
        return Redirect::to('/retail/usuarios');
    }
}
