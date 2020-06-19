@extends('layouts.admin')
@section('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
		<h3>Listado de clientes 
			<a href="/catalogo/cliente/create" class="btn btn-success"> <span class="fa fa-plus"></span> Nuevo</a>
			<!--<a href="/catalogo/cliente/index/pdf" class="btn btn-danger"> <span class="fa fa-file-pdf-o"></span> Reporte</a>-->
		</h3>
		@include('catalogo.cliente.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<th>Codigo</th>
				<th>Nombre</th>
				<th>Dirección</th>
				<th>Teléfono</th>
				<th>Estado</th>
				<th>Opciones</th>
			</thead>
			@foreach ($clientes as $cat)
			<tr>
				<td>{{$cat->codigo}}</td>
				<td>{{$cat->nombre}}</td>
				<td>{{$cat->direccion}}</td>
				<td>{{$cat->telefono}}</td>
				<td>{{$cat->estado}}</td>
				<td style="text-align: center;">
					<a href="/catalogo/cliente/{{$cat->id}}/edit" class="btn btn-info"><span class="fa fa-edit"></span> Editar</a>
					<a href="" data-target="#model-delete-{{$cat->id}}" data-toggle="modal" class="btn btn-danger"><span class="fa fa-remove"> Eliminar</a>
				</td>
			</tr>
				@include('catalogo.cliente.modal')
			@endforeach 
		</table>
		</div>
		{{$clientes->render()}} 
	</div>
</div>	
@endsection