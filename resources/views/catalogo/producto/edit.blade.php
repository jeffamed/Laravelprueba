@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Producto: {{$producto->nombre}}</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<form method="POST" action="{{route('producto.update', $producto->id)}}" role="form">
			@csrf 
			<input type="hidden" name="_method" value="PATCH">
			<label for="">Cambio del Dia: <b>C$ {{$tasa->monto}}</b></label>
			<input type="hidden" name="" value="{{$tasa->monto}}" id="txtTasa">
			<div class="form-group">
				<label for="nombre">Codigo SKU</label>
				<input type="text" name="SKU" value="{{$producto->SKU}}" class="form-control" placeholder="Codigo...">
			</div>				
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" value="{{$producto->nombre}}" class="form-control" placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="nombre">Stock</label>
				<input type="text" name="stock" value="{{$producto->stock}}" class="form-control" placeholder="Existencia...">
			</div>
			<div class="form-group">
				<label for="PrecioDolar">Precio $</label>
				<input type="text" name="precioDolar" id="txtdolar"  value="{{$producto->precioDolar}}" class="form-control" placeholder="Precio Dolar...">
			</div>
			<div class="form-group">
				<label for="Preciocordoba">Precio C$</label>
				<input type="text" name="precioCordoba" id="txtcordoba" value="{{$producto->precioCordoba}}" class="form-control" placeholder="Precio Cordoba...">
				<button type="button" onclick="PrecioCordoba()">Calcular Precio</button>
			</div>
			<div class="form-group">
				<label for="direccion">Descripción</label>
				<input type="text" name="descripcion" value="{{$producto->descripcion}}" class="form-control" placeholder="Descripcion...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{route('producto.index')}}"><button class="btn btn-danger" type="button">Regresar</button></a>
			</div>
			</form>

		</div>
	</div>
	@push('scripts')
	<script>
		function PrecioCordoba() {
			tasa = $("#txtTasa").val();
			precioD = $("#txtdolar").val();
			total = parseFloat(tasa) * parseFloat(precioD);
			$("#txtcordoba").val(total);
		}
	</script>
	@endpush
@endsection