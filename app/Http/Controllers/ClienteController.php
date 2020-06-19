<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Cliente;
use App\Http\Requests\ClienteRequest;
use DB; 

class ClienteController extends Controller
{
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $clientes=DB::table('clientes as c')
            ->select('c.id','c.nombre','c.codigo','c.direccion','c.telefono','c.estado')
            ->where('c.nombre','LIKE','%'.$query.'%')
            ->orwhere('c.codigo','LIKE','%'.$query.'%')
            ->orderBy('c.id','desc')
            ->paginate(5);
            return view('catalogo.cliente.index', ["clientes"=>$clientes, "searchText"=>$query]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       /* $clientes=DB::table('clientes')
        ->where('Estado','=','Activo')
        ->get();*/
        return view("catalogo.cliente.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $cliente = new Cliente;
        $cliente->id=$request->get('id');
        $cliente->codigo=$request->get('codigo');
        $cliente->nombre=$request->get('nombre');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->estado='Activo';
        $cliente->save();
        return Redirect::to('catalogo/cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $id)
    {
        $cliente = Cliente::find($id);
        return view("catalogo.cliente.show", compact($cliente));
        // return view("catalogo.articulo.show",["articulo"=>Articulo::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view("catalogo.cliente.edit",["cliente"=>$cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->codigo=$request->get('codigo');
        $cliente->nombre=$request->get('nombre');
        $cliente->direccion=$request->get('direccion');
        $cliente->telefono=$request->get('telefono');
        $cliente->estado='Activo';
        $cliente->update();
        return Redirect::to('catalogo/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->estado='Inactivo';
        $cliente->update();
        return Redirect::to('catalogo/cliente');
    }
}
