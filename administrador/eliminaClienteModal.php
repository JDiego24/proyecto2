<!-- Modal -->
<div class="modal fade" id="eliminaClienteModal" tabindex="-1" aria-labelledby="eliminaClienteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eliminaClienteModalLabel">Aviso</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Desea eliminar el cliente?
        
      </div>

      <div class="modal-footer">
      <form action="eliminar_cliente.php" method="post">
          
          <input type="hidden" name="id_user" id="id_user">
          
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-trash"></i> Eliminar</button>
          

        </form>

      </div>
      
    </div>
  </div>
</div>