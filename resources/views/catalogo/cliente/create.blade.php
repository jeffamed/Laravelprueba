@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Cliente</h3>
			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
			<form method="POST" action="{{ route('cliente.store') }}" role="form">
			@csrf
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" value="{{old('$nombre')}}" class="form-control" placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="codigo">Codigo</label>
				<input type="text" name="codigo" value="{{old('$codigo')}}" class="form-control" placeholder="Codigo...">
			</div>
			<div class="form-group">
				<label for="telefono">Teléfono</label>
				<input type="text" name="telefono" value="{{old('$telefono')}}" class="form-control" placeholder="Telefono...">
			</div>
			<div class="form-group">
				<label for="direccion">Dirección</label>
				<input type="text" name="direccion" value="{{old('$direccion')}}" class="form-control" placeholder="Dirección...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Guardar</button>
				<button class="btn btn-danger" type="reset"><span class="fa fa-remove"></span> Cancelar</button>
			</div>
				
			</form>
		</div>
	</div>
@endsection