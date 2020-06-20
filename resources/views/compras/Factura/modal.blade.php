<div class="modal fade modal-slide-in-right" aria-hidden="true" 
role="dialog" tabindex="-1" id="model-delete-{{$ing->id}}">
{{-- 	<form action="{{action('CategoriaController@destroy', $cat->idcategoria)}}" method="POST">
	{{csrf_field()}} --}}
	{!! Form::open(['route'=>['factura.destroy', $ing->id], 'method'=>'delete']) !!}
	<input type="hidden" name="_method" value="delete">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
					<span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title">Anular factura {{$ing->id}}</h4>
			</div>
			<div class="modal-body">
				<p>Confirme si desea anular el factura</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
	{{-- </form> --}}
</div>