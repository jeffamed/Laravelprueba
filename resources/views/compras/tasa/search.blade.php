<form action="/compras/tasa" method="GET">
	{{-- @csrf --}}
<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar por nombre" value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary"><span class="fa fa-search"></span> Buscar</button>
		</span>
	</div>
</div>
	
</form>
