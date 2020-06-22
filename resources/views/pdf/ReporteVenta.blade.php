<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Informe</title>
    <style>
        *{
            margin: 3px;
            padding: 0;
        }
        @page {
            margin: 0cm 0cm;
        }
        /*body {
            margin: 3cm 2cm 2cm;
        }*/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 20vh;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 10vh;
            /*background-color: #2a0927;
            color: white;*/
        }
        main{
            position: relative;
            top:125px
        }
        body{
            margin: 0;
            margin-left: 10px;
            font-size: 13px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
        h5{
            font-weight: 800;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            text-transform: uppercase;
        }
        .d-flex{
            display: flex;
        }
        .bold{
            font-weight: bold
        }
        .text-center{
            text-align: center
        }
        .f-left{
            float: left;
        }
        .w-33{
            width: 32%;
        }
        .border{
            border: 1px solid;
        }
        .datos{
            /*margin-top: 25px;*/
            width: 100%;
            height: 3%;
            text-align: center;
        }
        .item-datos{
            width: 30%;
            display: inline-block;
        }
        .datos2{
            width: 100%;
            height: 3%;
            text-align: left;
        }
        .b-bottom{
            padding-bottom: -10px;
            margin-bottom: 10px;
            border-bottom: 2px solid;
        }
        main{
            width: 100%;
        }
        .tabla{
            width: 100%;
            border-spacing: 0;
            padding: 0;
            margin: 0;
        }
        th,td{
            text-align: left;
           /* border: 1px solid;*/
            border-spacing: 0;
            border-collapse: collapse;
        }
        tbody{
            border-bottom: 1px solid;
        }
        th{
            border-top: 1px solid;
            border-bottom: 1px solid;
            text-align: center;
        }
        tfoot tr td{
            padding-top: 10px;
        }
        .center{
            text-align: center
        }
        .right{
            text-align: right
        }
        .left{
            text-align: left;
            display: float;
        }
        
    </style>
</head>
<body>
    <!--- ORIGINAL -->
    <header>
            <div class="titulo">
                <h2 class="bold text-center">Compañia Licorera de Nicaragua</h2>
                <h3 class="text-center">Reporte de venta del mes</h3>
            </div>
            <hr>
                <div>
                @foreach ($dolar as $det)
                    <p class="f-left"><b>Cliente:</b> {{$det->codigo}} - {{$det->cliente}}</p>
                @endforeach
                    <p class="right"><b>Fecha Impresión:</b> {{$hoy}}</p>
                </div>
            <hr>
    </header>
    <main>
    <h5>Total del ventas en DOLAR</h5>
        <table class="tabla" style="margin-bottom: 50px">
            <thead>
                <tr>
                    <th>Codigo SKU</th>
                    <th>Producto</th>
                    <th>Mes</th>
                    <th>Año</th>
                    <th>Total Fact.</th>
                    <th>Total $</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dolar as $det)
                    <tr>
                        <td class="center">{{$det->SKU}}</td>
                        <td class="center">{{$det->producto}}</td>
                        <td class="center">6</td>
                        <td class="center">2020</td>
                        <td class="center">{{$det->facturas}}</td>
                        <td class="center">{{$det->total}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h5>Total del ventas en CORDOBA</h5>
        <table class="tabla">
            <thead>
                <tr>
                    <th>Codigo SKU</th>
                    <th>Producto</th>
                    <th>Mes</th>
                    <th>Año</th>
                    <th>Total Fact.</th>
                    <th>Total $</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cordoba as $det)
                    <tr>
                        <td class="center">{{$det->SKU}}</td>
                        <td class="center">{{$det->producto}}</td>
                        <td class="center">6</td>
                        <td class="center">2020</td>
                        <td class="center">{{$det->facturas}}</td>
                        <td class="center">{{$det->total}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="f-left">
           
        </div>
    </main>
</body>
</html>