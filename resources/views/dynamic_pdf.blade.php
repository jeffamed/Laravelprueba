<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<title>Reporte</title>
	<style type="text/css">
		.box{
			width: 600px;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<h3 align="center">Laraavel - How to Generate Dynamic PDF from HTML using DomPDF</h3>
		<hr>
		<div class="row">
			<div class="col-md-7" align="right">
				<h4>Object Data</h4>
			</div>
			<div class="col-md-5" align="right">
				<a href="{{url('dynamic_pdf/pdf')}}" class="btn btn-danger">Convert into PDF</a>
			</div>
		</div>
		<br>
		<div class="table-responsive">
			<table class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Codigo</th>
						<th>Nombre</th>
						<th>Categoria</th>
						<th>Stock</th>
						<th>Descripcion</th>
					</tr>
				</thead>
				<tbody>
					@foreach($customer_data as $obj)
					<tr>
						<td>{{ $obj->codigo }}</td>
						<td>{{ $obj->nombre }}</td>
						<td>{{ $obj->categoria }}</td>
						<td>{{ $obj->stock }}</td>
						<td>{{ $obj->descripcion }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>