<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class ReporteController extends Controller
{
    public function index(Request $request)
    {
        $fecha = Carbon::now();
        $año = $fecha->format('Y');
        return view('reporte.ventas.index',["anio"=>$año]);
    }
    public function reporte($tipoc,$cliente,$tipop,$producto,$mes)
    {
        $fecha = Carbon::now();
        $hoy = $fecha->format('d-m-Y');
        $facturadolar = DB::table('facturas as f')->join('clientes as c','f.idCliente','=','c.id')
                        ->join('detalleFactura as df','f.id','=','df.idFactura')->join('productos as p','df.idProducto','=','p.id')
                        ->select('c.codigo','c.nombre as cliente','p.SKU','p.nombre as producto',DB::RAW('SUM(f.total) as total, COUNT(f.id) as facturas'))
                        ->whereMonth('f.created_at',$mes)
                        ->whereYear('f.created_at','2020')
                        ->where([
                            ['c.'.$tipoc,'LIKE','%'.$cliente.'%'],
                             ['p.'.$tipop,'LIKE','%'.$producto.'%'],
                            ['f.tipoFactura','=','Dolar']
                        ])->groupBy('c.codigo','c.nombre','p.SKU','p.nombre')->get();
        $facturacordoba = DB::table('facturas as f')->join('clientes as c','f.idCliente','=','c.id')
                        ->join('detalleFactura as df','f.id','=','df.idFactura')->join('productos as p','df.idProducto','=','p.id')
                        ->select('c.codigo','c.nombre as cliente','p.SKU','p.nombre as producto',DB::RAW('SUM(f.total) as total, COUNT(f.id) as facturas'))
                        ->whereMonth('f.created_at',$mes)
                        ->whereYear('f.created_at','2020')
                        ->where([
                            ['c.'.$tipoc,'LIKE','%'.$cliente.'%'],
                             ['p.'.$tipop,'LIKE','%'.$producto.'%'],
                            ['f.tipoFactura','=','Cordoba']
                        ])->groupBy('c.codigo','c.nombre','p.SKU','p.nombre')->get();

        $view=view('pdf.ReporteVenta',["dolar"=>$facturadolar, "cordoba"=>$facturacordoba, "hoy"=>$hoy])->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper("letter","portrait");
        return $pdf->stream();
    }

    public function info()
    {   
        $fecha = Carbon::now();
        $hoy = $fecha->format('Y-m-d');
        $tasa = DB::table('tasac')->select('monto')->orderBy('created_at','desc')->first();
        $facturas = DB::table('facturas')->select(DB::raw('count(*) as facturado'))->whereDate('created_at',$hoy)->where('estado','=','Activo')->get();
        $cancelada = DB::table('facturas')->select(DB::raw('count(*) as cancel'))->whereDate('created_at',$hoy)->where('estado','=','Anulada')->get();
        $producto = DB::table('productos')->select(DB::raw('count(*) as total'))->where('estado','=','Activo')->get();
        return view('welcome',['tasas'=>$tasa, 'registro'=>$facturas, 'cancelada'=>$cancelada,'inventario'=>$producto]);     
    }
}
