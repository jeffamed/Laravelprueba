<div class="modal fade modal-slide-in-right" aria-hidden="true" 
role="dialog" tabindex="-1" id="model-delete-{{$cat->id}}">
	{{-- <form action="/catalogo/cliente" method="POST"> --}}
	{{!! Form::open(['action'=>['ClienteController@destroy', $cat->id], 'method'=>'delete']) !!}}
		{{-- @csrf --}}
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-Label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<h4 class="modal-title">Eliminar Cliente</h4>
					</div>
					<div class="modal-body">
						<p>Confirme si desea eliminar el cliente</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Confirmar</button>
					</div>
				</div>
			</div>
	{{!! Form::close()}}
	{{-- </form> --}}
</div>