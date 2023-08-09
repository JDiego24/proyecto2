<!-- Modal -->
<div class="modal fade" id="nuevoReservacionModal" tabindex="-1" aria-labelledby="nuevoReservacionModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="nuevoReservacionModalLabel">Realizar Reservacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="agregar_reservacion.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="nombreCliente">Nombre del reservador:</label>
              <input type="text" value="<?php echo $row_cliente['fullName'];?>" class="form-control" name="nombreCliente" id="nombreCliente" placeholder="Ingrese el nombre del reservado">
            </div>
            <div class="form-group">
              <label for="phone">Telefono de contacto:</label>
              <input type="text" value="<?php echo $row_cliente['phone'];?>" class="form-control" name="phone" id="phone" placeholder="Ingrese el telefono de contacto">
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
              <label for="champagne">Champagne de Cortesia:</label>
              <select type="select" class="form-control" name="champagne" id="champagne" placeholder="Ingrese la champagne de cortesia" >
              </select>
              <small>Una vez elegido el champagne no se modificara</small>
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
<script>

document.addEventListener('DOMContentLoaded', () => {
    const selectTipoChampagne = document.getElementById('champagne');

    // Fetch del archivo JSON
    fetch('../champagne.json')
        .then(response => response.json())
        .then(data => {
            // Llenar el elemento select con los tipos de champán
            data.forEach(champagne => {
                const option = document.createElement('option');
                option.value = champagne.tipo;
                option.textContent = champagne.tipo;
                selectTipoChampagne.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar los tipos de champán:', error));
});

</script>