@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo factura</h3>

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
	<form method="POST" action="/compras/factura"> 
		{{-- @csrf --}}
		<div class="row">
			<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
				<div class="form-group">
					<label for="proveedor">Proveedor</label>
					<select name="idproveedor" id="idproveedor" class="form-control selectpicker" data-live-search="true">
						@foreach($personas as $persona)
						<option value="{{$persona->idpersona}}">{{$persona->nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label>Tipo comprobante</label>
					<select name="tipo_comprobante" class="form-control">
						<option value="Boleta">Boleta</option>
						<option value="Factura">Factura</option>
						<option value="Ticket">Ticket</option>
					</select>
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label for="serie_comprobante">Serie Comprobante</label>
					<input type="text" name="serie_comprobante" value="{{old('serie_comprobante')}}" class="form-control" placeholder="Series del comprobante..">
				</div>
			</div>
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label for="num_comprobante">Numero Comprobante</label>
					<input type="text" name="num_comprobante" value="{{old('num_comprobante')}}" required class="form-control" placeholder="Numeros del comprobante..">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
						<div class="form-group">
							<label>Articulo</label>
							<select name="idarticulo" class="form-control" id="pidarticulo" data-live-search="true">
								@foreach($articulos as $articulo)
								<option value="{{$articulo->idarticulo}}">{{$articulo->nombre}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="cantidad">Cantidad</label>
							<input type="number" name="cantidad" id="pcantidad" class="form-control" placeholder="Cantidad" min="0">
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="precio_comprar">Precio Compra</label>
							<input type="number" name="precio_compra" id="pprecio_compra" class="form-control" placeholder="Precio compra" min="0">
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="precio_cventa">Precio Venta</label>
							<input type="number" name="precio_venta" id="pprecio_venta" class="form-control" placeholder="Precio Venta" min="0">
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<button type="button" id="bt_add" class="btn btn-primary"><span class="fa fa-circle-plus"></span> Agregar</button>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
						<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
							<thead style="background-color:#A9D0F5">
								<th>Opciones</th>
								<th>Articulo</th>
								<th>Cantidad</th>
								<th>Precio Compra</th>
								<th>Precio Venta</th>
								<th>Subtotal</th>
							</thead>
							<tfoot>
								<th>Total</th>
								<th></th>
								<th></th>
								<th></th>
								<th></th>
								<th><h4 id="total">C$ 0.00</h4></th>
							</tfoot>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
				<div class="form-group">
					@csrf
					<button class="btn btn-primary" type="submit">Guardar</button>
					<button class="btn btn-danger" type="reset">Cancelar</button>
				</div>
			</div>
		</div>

	</form>

	@push('scripts')

		<script>

			$(document).ready(function(){
				$('#bt_add').click(function(){
					agregar();
				});
			});


			var cont=0;
			total=0;
			subtotal=[];
			$("#guardar").hide();

			function agregar()
			{
				idarticulo=$("#pidarticulo").val();
				articulo=$("#pidarticulo option:selected").text();
				// cantidad=$("#pcantidad").val();
				cantidad=document.getElementById("pcantidad").value;
				precio_compra=$("#pprecio_compra").val();
				precio_venta=$("#pprecio_venta").val();

				if (idarticulo!="" && cantidad!="" && cantidad>0 && precio_compra!="" && precio_venta!="") 
				{
					subtotal[cont]=(cantidad*precio_compra);
					total=total+subtotal[cont];

					var fila='<tr class="select" id="fila'+cont+'"><td><button class="btn btn-warning" onclick="eliminar('+cont+');">&times</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="precio_compra[]" value="'+precio_compra+'">'+precio_compra+'</td><td><input type="hidden" name="precio_venta[]" value="'+precio_venta+'">'+precio_venta+'</td><td>'+subtotal[cont]+'</td></tr>';
					
					cont++;
					limpiar();
					$("#total").html("C$ "+total);
					evaluar();
					$("#detalles").append(fila);
				}
				else
				{
					alert("Error al ingresar el detalle de factura, revise los datos del articulo");
				}
			}

			function limpiar()
			{
				$("#pcantidad").val("");
				$("#pprecio_compra").val("");
				$("#pprecio_venta").val("");

			}

			function evaluar()
			{
				if (total>0) 
				{
					$("#guardar").show();
				}
				else
				{
					$("#guardar").hide();
				}
			}

			function eliminar(index) {
				total=total-subtotal[index];
				$("#total").html("C$ "+total);
				$("#fila"+ index).remove();
				evaluar();
			}

		</script>
	@endpush

@endsection