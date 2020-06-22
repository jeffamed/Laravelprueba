@extends('layouts.admin')
@section('contenido')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: #2b4fdbe0; color: white">
                <div class="inner">
                 <h3> C$ {{ $tasas->monto }} </h3>
                <p>Tasa de cambio</p>
                </div>
                <div class="icon">
                <i class="fa fa-usd"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box" style="background: green; color: white">
                <div class="inner">
                <h3>{{ $registro[0]->facturado }}</h3>
    
                <p>Facturas del dia</p>
                </div>
                <div class="icon">
                <i class="fa fa-money"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box " style="background: red; color: white">
                <div class="inner">
                <h3>{{ $cancelada[0]->cancel }}</h3>
    
                <p>Facturas anuladas</p>
                </div>
                <div class="icon">
                <i class="fa fa-close"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger" style="background: #f4f40fe6 ; color: white">
                <div class="inner">
                    <h3>{{ $inventario[0]->total }}</h3>
    
                    <p>Inventario</p>
                </div>
                <div class="icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
            </div>
        </div>
            <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <h3 class="text-center">Sistema de Facturación para CLN</h3>
            <p class="text-center">
                <a href="{{url('/compras/factura')}}" style="font-size: 20px">Ir a Factura</a>
            </p>
        </div>
    </div>
</div>
@endsection
