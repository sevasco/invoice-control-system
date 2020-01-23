<div class="modal fade" tabindex="-1" role="dialog" id="confirmDeleteModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __("¿Estás seguro?") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __("¡Esta acción no se puede deshacer!") }}</p>
                @isset($side_effect) <p>{{ $side_effect }}</p> @endisset
                <form id="deleteForm" action="" method="post">
                    @method('DELETE')
                    @csrf()
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Cerrar") }}</button>
                <button type="submit" form="deleteForm" class="btn btn-danger">{{ __("Eliminar") }}</button>
            </div>
        </div>
    </div>
</div>
