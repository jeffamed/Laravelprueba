<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use App\DetalleFactura;
use App\Factura;
use DB;

use Response;
use Illuminate\Support\Collection;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request){
            $query=trim($request->get('searchText'));
            $factura=DB::table('facturas as f')
            ->join('clientes as c','f.idCliente','=','c.id')
            ->join('tasac as tc','f.idTasa','=','tc.id')
            ->select('f.id','f.idTasa','f.total','f.tipoFactura','f.Estado','c.Nombre','f.estado','tc.monto','c.nombre','f.created_at')
            ->orderBy('f.id','desc')
            ->paginate(5);
            return view('compras.factura.index',["facturas"=>$factura,"searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cliente = DB::table('clientes')->where('estado','=','Activo')->get();
        $tasa = DB::table('tasac')->orderBy('created_at','desc')->first();
        $producto= DB::table('productos')->where('estado','=','Activo')->get();
        return view("compras.factura.create",["clientes"=>$cliente, "tasa"=>$tasa, "productos"=>$producto]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
                $factura = new Factura;
                $factura->idcliente=$request->get('idcliente');
                $factura->tipofactura=$request->get('tipofactura');
                $factura->total=$request->get('total');
                $factura->estado='Activo';
                $factura->save();

                $idarticulo=$request->get('idarticulo');
                $cantidad=$request->get('cantidad');
                //$descuento=$request->get('descuento');
                $precio_venta=$request->get('precio_venta');

                $cont=0;
                while ($cont < count($idarticulo)) {
                    $detalle = new DetalleFactura();
                    $detalle->idventa=$factura->id;
                    $detalle->idarticulo=$idarticulo[$cont];
                    $detalle->cantidad=$cantidad[$cont];
                    $detalle->precio_venta=$precio_venta[$cont];
                    $detalle->save();
                    $cont=$cont+1;
                }
            
            DB::commit();

        }
        catch (\Exception $e) 
        {
            DB::rollback();
        }
        return Redirect::to('compras/factura');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $factura=DB::table('facturas as f')
        ->join('clientes as c','f.idCliente','=','c.id')
        ->join('detalle_venta as dv','v.idventa','=','dv.idventa')
        ->select('v.idventa','v.fecha_hora','p.nombre','v.tipo_comprobante','v.serie_comprobante','v.num_comprobante','v.impuesto','v.estado','v.total_venta')
        ->where('v.idventa','=',$id)
        ->first();

        $detalles=DB::table('detallefacturas as d')
                ->join('articulo as a','d.idarticulo','=','a.idarticulo')
                ->select('a.nombre as articulo','d.cantidad','d.descuento','d.precio_venta')
                ->where('d.idventa','=',$id)
                ->get();
        return view("ventas.venta.show",["venta"=>$factura,"detalles"=>$detalles]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $factura=Factura::findOrFail($id);
        $factura->Estado='Anulada';
        $factura->update();
        return Redirect::to('compras/factura');
    }
}
