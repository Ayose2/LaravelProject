<div class="modal fade" id="remove-product-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar producto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-danger" role="alert" id="error-remove-producto">
            Hubo un error en el borrado del producto, el producto <b>no</b> ha sido eliminado
          </div>
          ¿Esta seguro de querer borrar este producto?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" id="submit-remove-button" onclick="submitEliminarProducto();" data-producto="0">Eliminar</button>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        </div>
      </div>
    </div>
</div>