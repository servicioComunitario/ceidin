<div class="modal fade modal-eliminacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel2">Confirmar Eliminación</h4>
            </div>
            <div class="modal-body">
                <p>¿Realmente desea eliminar este registro?</p>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <form action={{ route('periodos.destroy', "-1") }} method="POST">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <input type="hidden" id="id-eliminar" name="id">
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="$('#id-eliminar').removeAttr('value')">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>