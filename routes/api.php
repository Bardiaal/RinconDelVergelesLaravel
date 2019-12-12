<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('categoria', 'CategoriaController');
Route::resource('comanda', 'ComandaController');
Route::resource('empleado', 'EmpleadoController');
Route::resource('factura', 'FacturaController');
Route::resource('historial', 'HistorialController');
Route::resource('mesa', 'MesaController');
Route::resource('producto', 'ProductoController');

Route::get('factura/mesa/{id}', 'FacturaController@getSpecificFacturas');
Route::get('producto/categoria/{id}', 'ProductoController@getSpecificProductos');
Route::get('producto/getsome/{ids}', 'ProductoController@getProductosName');
Route::get('comanda/factura/{id}', 'ComandaController@getSpecificComandas');
Route::get('mesa/ocupada/{status}', 'MesaController@ocupada');
Route::get('factura/abierta/{idEmpleado}', 'FacturaController@getFacturasAbiertas');