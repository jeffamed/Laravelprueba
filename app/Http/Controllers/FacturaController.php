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
}
