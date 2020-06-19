@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{$cliente->nombre}}</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<form method="POST" action="{{route('cliente.update', $cliente->id)}}" role="form">
			@csrf 
			<input type="hidden" name="_method" value="PATCH">				
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" value="{{$cliente->nombre}}" class="form-control" placeholder="Nombre...">
			</div>
			<div class="form-group">
				<label for="nombre">Codigo</label>
				<input type="text" name="codigo" value="{{$cliente->codigo}}" class="form-control" placeholder="Codigo...">
			</div>
			<div class="form-group">
				<label for="nombre">Teléfono</label>
				<input type="text" name="telefono" value="{{$cliente->telefono}}" class="form-control" placeholder="Telefono...">
			</div>
			<div class="form-group">
				<label for="descripcion">Dirección</label>
				<input type="text" name="direccion" value="{{$cliente->direccion}}" class="form-control" placeholder="Dirección...">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<a href="{{route('cliente.index')}}"><button class="btn btn-danger" type="button">atras</button></a>
			</div>
			</form>

		</div>
	</div>
@endsection