@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar tasa: {{$tasa->created_at}}</h3>

			@if(count($errors)>0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>

	<form method="POST" action="{{route('tasa.update', $tasa->id)}}" role="form">
	{{csrf_field()}} 
	<input type="hidden" name="_method" value="PATCH">				
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Monto</label>
				<input type="text" name="monto" required value="{{$tasa->monto}}" class="form-control" placeholder="Monto..">
			</div>
		</div>
		
		<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
				<button class="btn btn-danger" type="reset">Cancelar</button>
		</div>
				
	</form>

@endsection