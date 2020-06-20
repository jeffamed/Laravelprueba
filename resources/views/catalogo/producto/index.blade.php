@extends('layouts.admin')
@section('contenido')

<div class="row">
	<div class="col-lg-8 col-md-8 col-ms-8 col-xs-12">
		<h3>Listado de productos 
			<a href="/catalogo/producto/create" class="btn btn-success"> <span class="fa fa-plus"></span> Nuevo</a>
			<!--<a href="/catalogo/producto/index/pdf" class="btn btn-danger"> <span class="fa fa-file-pdf-o"></span> Reporte</a>-->
		</h3>
		@include('catalogo.producto.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-xs-12">
	<div class="table-responsive">
		<table class="table table-striped table-bordered table-condensed table-hover">
			<thead>
				<th>SKU</th>
				<th>Nombre</th>
				<th>Precio C$</th>
				<th>Precio $</th>
				<th>Existencia</th>
				<th>Descripción</th>
				<th>Opciones</th>
			</thead>
			@foreach ($productos as $cat)
			<tr>
				<td>{{$cat->SKU}}</td>
				<td>{{$cat->nombre}}</td>
				<td>{{$cat->precioCordoba}}</td>
				<td>{{$cat->precioDolar}}</td>
				<td>{{$cat->stock}}</td>
				<td>{{$cat->descripcion}}</td>
				<td style="text-align: center;">
					<a href="/catalogo/producto/{{$cat->id}}/edit" class="btn btn-info"><span class="fa fa-edit"></span> Editar</a>
					<a href="" data-target="#model-delete-{{$cat->id}}" data-toggle="modal" class="btn btn-danger"><span class="fa fa-remove"> Eliminar</a>
				</td>
			</tr>
				@include('catalogo.producto.modal')
			@endforeach 
		</table>
		</div>
		{{$productos->render()}} 
	</div>
</div>	
@endsection