@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nueva tasa</h3>
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
			<form method="POST" action="{{route('tasa.store')}}" role="form">
			{{csrf_field()}} 
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="nombre">Monto</label>
				<input type="text" name="monto" required value="{{old('monto')}}" class="form-control" placeholder="Nombre...">
			</div>
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="submit"><span class="fa fa-save"></span> Guardar</button>
				<button class="btn btn-danger" type="reset"><span class="fa fa-remove"></span> Cancelar</button>
			</div>
				
			</form>

@endsection