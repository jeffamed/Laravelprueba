@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<label for="proveedor">Cliente: <big><u>{{$factura->nombre}}</u></big></label>
			</div>
		</div>
		
		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label>Tipo Factura</label>
				<p>{{ $factura->tipoFactura }}</p>
			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<label for="serie_comprobante">Fecha de Registro</label>
				<p>{{$factura->created_at}}</p>
			</div>
		</div>

		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
			<div class="form-group">
				<h4 id="txtestado">{{$factura->estado}}</h4>
			</div>
		</div>

	</div>
	<div class="row">
		<div class="panel panel-primary">
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
						<thead style="background-color:#A9D0F5">
							<th>Articulo</th>
							<th>Cantidad</th>
							<th>Precio Venta</th>
							<th>Subtotal</th>
						</thead>
						<tfoot>
							<th><h4>Total</h4></th>
							<th></th>
							<th></th>
							<th><h4 id="total">C$ {{$factura->total}}</h4></th>
						</tfoot>
						<tbody>
							@foreach($detalles as $det)
								<tr>
									<td>{{$det->nombre}}</td>
									<td>{{$det->cantidad}}</td>
									<td>{{$det->precio}}</td>
									<td>{{($det->cantidad*$det->precio)+(($det->cantidad*$det->precio)*0.15)}}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
			<div class="form-group">
				<a href="{{ URL::previous() }}" class="btn btn-danger">Regresar</a>
			</div>
		</div>
	</div>
@push('scripts')
	
@endpush

@endsection