<!-- Modal -->
<div class="modal fade" id="editaClienteModal" tabindex="-1" aria-labelledby="editaClienteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editaClienteModalLabel">Editar Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="actualizar_cliente.php" method="post" enctype="multipart/form-data">

          <input type="hidden" id="id_user" name="id_user" readonly>

          <div class="form-group">
              <label for="full-name">Nombre del Cliente:</label>
              <input type="text" class="form-control" name="full-name" id="full-name" placeholder="Ingrese el nombre del cliente">
            </div>
            <div class="form-group">
              <label for="phone">Telefono del Cliente:</label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Ingrese el telefono del cliente">
            </div>
            <div class="form-group">
              <label for="email">Correo del cliente:</label>
              <input type="text" class="form-control" name="email" id="email" placeholder="Ingrese el correo del cliente">
            </div>
            <div class="form-group">
              <label for="password">Contraseña del cliente:</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Ingrese la contraseña del cliente">
            </div>

              
          
          <div class="">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
          </div>

        </form>
      </div>
      
    </div>
  </div>
</div>