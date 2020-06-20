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
	 @csrf 
		<div class="row">
			<div class="col-lg-9 col-sm-12 col-md-12 col-xs-12">
				<div class="form-group">
					<label for="cliente">Cliente</label>
					<select name="idcliente" id="idcliente" class="form-control selectpicker" data-live-search="true">
						@foreach($clientes as $cliente)
						<option value="{{$cliente->id}}">{{$cliente->nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>
			
			<div class="col-lg-3 col-sm-4 col-md-4 col-xs-12">
				<div class="form-group">
					<label>Tipo Factura</label>
					<select name="tipofactura" class="form-control" id="selecttipo">
						<option value="Cordoba">Cordoba</option>
						<option value="Dolar">Dolar</option>
					</select>
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
								@foreach($productos as $articulo)
								<option value="{{$articulo->id}}_{{$articulo->stock}}_{{$articulo->precioDolar}}_{{$articulo->precioCordoba}}">{{$articulo->nombre}}</option>
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
							<label for="stock">Stock</label>
							<input type="number" name="pstock" id="pstock" class="form-control" placeholder="Stock" min="0" disabled>
						</div>
					</div>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
						<div class="form-group">
							<label for="precio_cventa">Precio Venta</label>
							<input type="number" name="precio_venta" id="pprecio_venta" class="form-control" placeholder="Precio Venta" min="0" disabled>
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
								<th>Precio Venta</th>
								<th>IVA</th>
								<th>Subtotal</th>
							</thead>
							<tfoot>
								<tr>
									<th>Total</th>
									<th></th>
									<th></th>
									<th></th>
									<th></th>
									<th><h4 id="total">C$ 0.00</h4><input type="hidden" name="total" id="total_venta"></th>
								</tr>
							</tfoot>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
				<div class="form-group">
					@csrf
					<button class="btn btn-primary" id="guardar" type="submit">Guardar</button>
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
			$("#pidarticulo").change(mostrarValores);

			function mostrarValores() {
				tipofactura = $('#selecttipo').val();
				datosArticulos=document.getElementById("pidarticulo").value.split('_');
				$("#pstock").val(datosArticulos[1]);
				if(tipofactura == 'Dolar'){
					$("#pprecio_venta").val(datosArticulos[2]);
				}else{
					$("#pprecio_venta").val(datosArticulos[3]);
				}
			}

			function agregar()
			{
				datosArticulos=document.getElementById("pidarticulo").value.split("_");
				idarticulo=datosArticulos[0];
				articulo=$("#pidarticulo option:selected").text();
				cantidad=$("#pcantidad").val();
				precio_venta=$("#pprecio_venta").val();
				stock=$("#pstock").val();
				tipofactura = $('#selecttipo').val();

				if (idarticulo!="" && cantidad!="" && cantidad>0  && precio_venta!="") 
				{
					iva=(cantidad*precio_venta)*(0.15);
					subtotal[cont]=(cantidad*precio_venta)+iva;
					total=total+subtotal[cont];

					var fila='<tr class="select" id="fila'+cont+'"><td><button class="btn btn-warning" onclick="eliminar('+cont+');">&times</button></td><td><input type="hidden" name="idarticulo[]" value="'+idarticulo+'">'+articulo+'</td><td><input type="hidden" name="cantidad[]" value="'+cantidad+'">'+cantidad+'</td><td><input type="hidden" name="precio_venta[]" value="'+precio_venta+'">'+precio_venta+'</td><td>15%</td><td>'+subtotal[cont]+'</td></tr>';
					cont++;
					limpiar();
					if(tipofactura == 'Cordoba'){
						$("#total").html("C$ "+total);
					}else{
						$("#total").html("$ "+total);
					}
					$("#total_venta").val(total);
					evaluar();
					$("#detalles").append(fila);
				}
				else
				{
					alert("Error al ingresar el detalle de ingreso, revise los datos del articulo");
				}
			}

			function limpiar()
			{
				$("#pcantidad").val("");
				//$("#pprecio_compra").val("");
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
				tipofactura = $('#selecttipo').val();
				//subtotal=subtotal-subtotal[index];
				total=total-subtotal[index];

				if(tipofactura == 'Cordoba'){
					$("#total").html("C$ "+total);
				}else{
					$("#total").html("$ "+total);
				}
				
				$("#fila"+ index).remove();
				evaluar();
			}

		</script>
	@endpush

@endsection