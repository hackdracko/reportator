<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view('home');
    });
    Route::resource('/retail/usuarios', 'UserController');
    Route::get('/retail/usuarios/logicaldelete/{id}', 'UserController@logicaldelete');
});

Route::resource('/reportes', 'ReporteController');

/*****************/
/*PETICIONES AJAX*/
Route::post('/ajax/comboMarca', 'AjaxController@comboMarca');
Route::post('/ajax/comboDepartamento', 'AjaxController@comboDepartamento');
Route::post('/ajax/comboCategoria', 'AjaxController@comboCategoria');
Route::post('/ajax/comboPresentacion', 'AjaxController@comboPresentacion');
Route::post('/ajax/comboProductos', 'AjaxController@comboProductos');
Route::post('/ajax/comboGrupo', 'AjaxController@comboGrupo');
Route::post('/ajax/comboFormato', 'AjaxController@comboFormato');
Route::post('/ajax/comboCadena', 'AjaxController@comboCadena');
Route::post('/ajax/comboSucursal', 'AjaxController@comboSucursal');
Route::get('/download/{file}', 'AjaxController@downloadFile');
Route::post('/ajax/busqueda', 'AjaxController@busqueda');
/*****************/
/*****************/

/*Route::get('/reportes', function () {
    return view('reportes');
});*/

Route::auth();

Route::get('/home', 'HomeController@index');
