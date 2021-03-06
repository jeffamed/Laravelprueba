<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('catalogo/cliente', 'ClienteController');
Route::resource('catalogo/producto', 'ProductoController');
Route::resource('compras/tasa', 'TCambioController');
Route::resource('compras/factura', 'FacturaController');
Route::get('reporte/ventas','ReporteController@index');
Route::get('/','ReporteController@info');
//Route::get('reporte/ventas/pdf','ReporteController@reporte');
Route::get('reporte/ventas/{tipoc}/{cliente}/{tipop}/{producto}/{mes}/pdf','ReporteController@reporte');


