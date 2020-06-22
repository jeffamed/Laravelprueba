@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
		<h3>Listado de Facturas <a href="/compras/factura/create" class="btn btn-success"> <span class="fa fa-plus"></span> Nuevo</a></h3>
		@include('compras.factura.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<th>Num Factura</th>
				<th>Fecha</th>
				<th>Cliente</th>
				<th>Tipo Factura</th>
				<th>Tasa Cambio</th>
				<th>Total</th>
				<th>Estado</th>
				<th style="text-align: center;">Opciones</th>
			</thead>
			@foreach ($facturas as $ing)
			<tr>
				<td>{{$ing->id}}</td>
				<td>{{$ing->created_at}}</td>
				<td>{{$ing->nombre}}</td>
				<td>{{$ing->tipoFactura }}</td>
				<td>{{$ing->monto}}</td>
				<td>{{$ing->total}}</td>
				<td>{{$ing->estado}}</td>
				
				<td style="text-align: center;">
					<a href="/compras/factura/{{$ing->id}}" class="btn btn-info"><span class="fa fa-tasks"></span> Detalle</a>
					<a href="" data-target="#model-delete-{{$ing->id}}" data-toggle="modal" class="btn btn-danger"><span class="fa fa-minus-circle"></span> Anular</a>
				{{-- <form action="{{action('facturaController@destroy', $ing->idfactura)}}" method="post">
				@csrf
					<input type="hidden" name="_method" value="DELETE">
					<button class="btn btn-danger" type="submit" >Anular</button>
				</form> --}}
				</td>
			</tr>
			@include('compras.factura.modal')
			@endforeach
		</table>
		</div>
		{{$facturas->render()}}
	</div>
</div>	
@endsection