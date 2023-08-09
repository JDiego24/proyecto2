<!-- Modal -->
<div class="modal fade" id="editaReservacionModal" tabindex="-1" aria-labelledby="editaReservacionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editaReservacionModalLabel">Editar Reservacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="actualizar_reservacion.php" method="post" enctype="multipart/form-data">

          <input type="hidden" id="id_reservacion" name="id_reservacion" readonly>

            <div class="form-group">
              <label for="nombreCliente">Nombre del reservador:</label>
              <input type="text" class="form-control" name="nombreCliente" id="nombreCliente" placeholder="Ingrese el nombre del reservado">
            </div>
            <div class="form-group">
              <label for="phone">Telefono de contacto:</label>
              <input type="text" class="form-control" name="phone" id="phone" placeholder="Ingrese el numero de contacto">
            </div>
            <div class="form-group">
              <label for="numeroSillas">Numero de sillas:</label>
              <input type="text" class="form-control" name="numeroSillas" id="numeroSillas" placeholder="Ingrese el numero de sillas">
            </div>
            <div class="form-group">
              <label for="tipoMesa">Tipo de mesa:</label>
              <select type="select" class="form-control" name="tipoMesa" id="tipoMesa" placeholder="Ingrese un tipo de mesa" font-size="20px">
                <option value="BASICO">Basico</option>
                <option value="ALTO">Alto</option>
                <option value="VIP">VIP</option>
              </select>
            </div>
            <div class="form-group">
              <label for="fechaReservacion">Fecha de la reservacion:</label>
              <input type="date" class="form-control" name="fechaReservacion" id="fechaReservacion" placeholder="Ingrese la fecha">
            </div>
            <div class="form-group">
              <label for="horaReservacion">Hora de la reservacion:</label>
              <input type="time" class="form-control" name="horaReservacion" id="horaReservacion" placeholder="Ingrese el dia" >
            </div>
            
            <div class="form-group">
              <label for="comentarios">Comentarios:</label>
              <input type="text" class="form-control" name="comentarios" id="comentarios" placeholder="Ingresa comentarios adicionales a su visita">
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