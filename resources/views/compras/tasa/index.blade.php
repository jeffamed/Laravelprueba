@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
		<h3>Listado de Cambio
			<a href="/compras/tasa/create" class="btn btn-success"><span class="fa fa-plus"></span> Nuevo</a>
			<a href="https://www.bcn.gob.ni/estadisticas/mercados_cambiarios/tipo_cambio/cordoba_dolar/index.php" class="btn btn-default"> <span class="fa fa-file-pdf-o"></span> Buscar Tasa</a>
		</h3>
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<th>Monto C$</th>
				<th>Estado</th>
				<th>Fecha</th>
				<th style="text-align: center;">Opciones</th>
			</thead>
			@foreach ($tasas as $per)
			<tr>
				<td>{{$per->monto}}</td>
				<td>{{$per->estado}}</td>
				<td>{{$per->created_at}}</td>
				
				<td style="text-align: center;">
					<a href="/compras/tasa/{{$per->id}}/edit" class="btn btn-info"><span class="fa fa-edit"></span> Editar</a>
					<a href="" data-target="#model-delete-{{$per->id}}" data-toggle="modal" class="btn btn-danger"><span class="fa fa-remove"></span> Eliminar</a>
				</td>
			</tr>
			@include('compras.tasa.modal')
			@endforeach
		</table>
		</div>
		{{$tasas->render()}}
	</div>
</div>	
@endsection