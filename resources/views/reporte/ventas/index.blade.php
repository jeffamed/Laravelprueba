@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-8 col-md-8 -col-ms-8 col-xs-12">
            <h4>Ventas por mes</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-2 col-md-6 col-xs-12">
            <label for="selectcliente">Buscar cliente por:</label>
            <select name="cliente" id="selectcliente" class="form-control">
                <option value="codigo">Codigo</option>
                <option value="nombre">Nombre</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
            <label for="cliente">Cliente:</label>
            <input type="text" class="form-control" name="txtBuscarC" id="txtBuscarC">
        </div>
        <div class="col-lg-2 col-md-6 col-xs-12">
            <label for="selectproducto">Buscar producto por:</label>
            <select name="producto" id="selectproducto" class="form-control">
                <option value="SKU">Codigo SKU</option>
                <option value="nombre">Nombre</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
            <label for="producto">Producto:</label>
            <input type="text" class="form-control" name="txtBuscarP" id="txtBuscarP">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-xs-12">
            <label for="selectmes">Seleccione Mes:</label>
            <select name="mes" id="selectmes" class="form-control">
                <option value="1">Enero</option>
                <option value="2">Febrero</option>
                <option value="3">Marzo</option>
                <option value="4">Abril</option>
                <option value="5">Mayo</option>
                <option value="6">Junio</option>
                <option value="7">Julio</option>
                <option value="8">Agosto</option>
                <option value="9">Septiembre</option>
                <option value="10">Octubre</option>
                <option value="11">Noviembre</option>
                <option value="12">Diciembre</option>
            </select>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12">
            <label for="selectaño">Seleccion Año:</label>
            <select name="mes" id="selectaño" class="form-control">
                @for($i=2018; $i <= $anio; $i++)
                <option value="{{$i}}">{{$i}}</option>
                <!--<option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>-->
                @endfor
            </select>
        </div>
        <div class="col-lg-4 col-md-6 col-xs-12" style="margin-top: 2%">
            <a href="#" class="btn btn-primary" onclick="enviarReporte()" id="btnreporte">Generar Reporte</a>
        </div>
    </div>
@push('scripts')
    <script>
        function enviarReporte(){
            SelectCliente = $("#selectcliente").val();
            cliente=$("#txtBuscarC").val();
            SelectProducto = $("#selectproducto").val();
            producto = $("#txtBuscarP").val();
            mes = $("#selectmes").val();
            año = $("#selectaño").val();

            enlace = "http://127.0.0.1:8000/reporte/ventas/"+SelectCliente+"/"+cliente+"/"+SelectProducto+"/"+producto+"/"+mes+"/pdf";
            //enlace = "http://127.0.0.1:8000/reporte/ventas/pdf";

            document.getElementById('btnreporte').setAttribute("href",enlace);


        }
    </script>
@endpush
@endsection