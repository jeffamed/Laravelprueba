<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Producto;
use DB; 


class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            if($query == NULL){
                $producto=DB::table('productos as p')
                ->select('p.id','p.nombre','p.stock','p.SKU','p.precioCordoba','p.precioDolar','p.descripcion','p.estado')
                ->where('p.estado','Activo')
                ->orderBy('p.id','desc')
                ->paginate(5);
                return view('catalogo.producto.index',["productos"=>$producto,"searchText"=>$query]);
            }else{
                $producto=DB::table('productos as p')
                ->select('p.id','p.nombre','p.stock','p.SKU','p.precioCordoba','p.precioDolar','p.descripcion','p.estado')
                ->where('p.SKU','LIKE','%'.$query.'%')
                ->orwhere('p.descripcion','LIKE','%'.$query.'%')
                ->where('p.estado','Activo')
                ->orderBy('p.id','desc')
                ->paginate(5);
                return view('catalogo.producto.index',["productos"=>$producto,"searchText"=>$query]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tasa = DB::table('tasac')->select('monto')->orderBy('created_at','desc')->first();
        return view("catalogo.producto.create",["tasa"=>$tasa]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = new Producto;
        $producto->nombre = $request->get('nombre');
        $producto->stock = $request->get('stock');
        $producto->SKU = $request->get('SKU');
        $producto->precioCordoba = $request->get('precioCordoba');
        $producto->precioDolar = $request->get('precioDolar');
        $producto->descripcion = $request->get('descripcion');
        $producto->estado = 'Activo';
        $producto->save();
        return Redirect::to('catalogo/producto');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $id)
    {
        $producto = Producto::find($id);
        $tasa = DB::table('tasac')->select('monto')->orderBy('created_at','desc')->first();
        return view("catalogo.producto.show", ["producto"=>$producto, "tasa"=>$tasa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto=Producto::findOrFail($id);
        $tasa = DB::table('tasac')->select('monto')->orderBy('created_at','desc')->first();
        return view("catalogo.producto.edit",["producto"=>$producto, "tasa"=>$tasa]);
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
        $producto = Producto::findOrFail($id);
        $producto->nombre = $request->get('nombre');
        $producto->stock = $request->get('stock');
        $producto->SKU = $request->get('SKU');
        $producto->precioCordoba = $request->get('precioCordoba');
        $producto->precioDolar = $request->get('precioDolar');
        $producto->descripcion = $request->get('descripcion');
        $producto->estado = 'Activo';
        $producto->update();
        return Redirect::to('catalogo/producto');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->estado='Inactivo';
        $producto->update();
        return Redirect::to('catalogo/producto');
    }
}
