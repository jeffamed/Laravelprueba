<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Tasa_Cambio;
use Carbon\Carbon;
use DB;

class TCambioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy = Carbon::now();
        $mes = $hoy->format('m');
        $tasa=DB::table('tasac as t')
        ->select('t.id','t.monto','t.estado','t.created_at')
        ->whereMonth('t.created_at','=',$mes)
        ->orderBy('t.id','desc')
        ->paginate(5);
        return view('compras.tasa.index',["tasas"=>$tasa]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("compras.tasa.create");        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tasa = new Tasa_Cambio;
        $tasa->monto = $request->get('monto');
        $tasa->estado = 'Activo';
        $tasa->save();
        return Redirect::to('compras/tasa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tasa_Cambio $id)
    {
        $tasa = Tasa_Cambio::find($id);
        return view("compras.tasa.show",["tasa"=>$tasa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tasa = Tasa_Cambio::findOrFail($id);
        return view("compras.tasa.edit",["tasa"=>$tasa]);
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
        $tasa = Tasa_Cambio::findOrFail($id);
        $tasa->monto = $request->get('monto');
        $tasa->estado = 'Activo';
        $tasa->update();
        return Redirect::to('compras/tasa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tasa = Tasa_Cambio::findOrFail($id);
        $tasa->estado = 'Inactivo';
        $tasa->update();
        return Redirect::to('compras/tasa');
    }
}
