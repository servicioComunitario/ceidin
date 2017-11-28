<div class="modal fade" id='modal_eliminacion' tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Confirmar Eliminación</h4>
            </div>
            <div class="modal-body">
                <p>¿Desea Aprobar esta solicituda?</p>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    @if($bandera=='aprobar_retiro')
                        <form action={{ route('retiro.aprobar') }} method="POST">
                    @else
                        <form action={{ route('constancia.aprobar') }} method="POST">
                    @endif
                        {{ csrf_field() }}
                        <input type="hidden" id="id_eliminar" name="id">
                        <button type="button" class="btn btn-success" data-dismiss="modal" onclick="$('#id_eliminar').removeAttr('value')">Cancelar</button>
                        <button type="submit" class="btn btn-danger">Aceptar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>