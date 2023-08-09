//MODAL RESERVACIONES

let nuevoReservacionModal = document.getElementById('nuevoReservacionModal')
let editaReservacionModal = document.getElementById('editaReservacionModal')
let eliminaReservacionModal = document.getElementById('eliminaReservacionModal')

nuevoReservacionModal.addEventListener('shown.bs.modal', event => {
    nuevoReservacionModal.querySelector('.modal-body #nombreCliente').focus()


})

nuevoReservacionModal.addEventListener('hide.bs.modal', event => {
    nuevoReservacionModal.querySelector('.modal-body #nombreCliente').value = ""
    nuevoReservacionModal.querySelector('.modal-body #phone').value = ""
    nuevoReservacionModal.querySelector('.modal-body #numeroSillas').value = ""
    nuevoReservacionModal.querySelector('.modal-body #tipoMesa').value = ""
    nuevoReservacionModal.querySelector('.modal-body #fechaReservacion').value = ""
    nuevoReservacionModal.querySelector('.modal-body #horaReservacion').value = ""
    nuevoReservacionModal.querySelector('.modal-body #champagne').value = ""
    nuevoReservacionModal.querySelector('.modal-body #comentarios').value = ""

})

editaReservacionModal.addEventListener('hide.bs.modal', event => {
    editaReservacionModal.querySelector('.modal-body #nombreCliente').value = ""
    editaReservacionModal.querySelector('.modal-body #phone').value = ""
    editaReservacionModal.querySelector('.modal-body #numeroSillas').value = ""
    editaReservacionModal.querySelector('.modal-body #tipoMesa').value = ""
    editaReservacionModal.querySelector('.modal-body #fechaReservacion').value = ""
    editaReservacionModal.querySelector('.modal-body #horaReservacion').value = ""
    editaReservacionModal.querySelector('.modal-body #estatus').value = ""
    editaReservacionModal.querySelector('.modal-body #comentarios').value = ""
})

editaReservacionModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')

    let inputId = editaReservacionModal.querySelector('.modal-body #id_reservacion')
    let inputNombre = editaReservacionModal.querySelector('.modal-body #nombreCliente')
    let inputPhone = editaReservacionModal.querySelector('.modal-body #phone')
    let inputSilla = editaReservacionModal.querySelector('.modal-body #numeroSillas')
    let inputMesa = editaReservacionModal.querySelector('.modal-body #tipoMesa')
    let inputFecha = editaReservacionModal.querySelector('.modal-body #fechaReservacion')
    let inputHora = editaReservacionModal.querySelector('.modal-body #horaReservacion')
    let inputEstatus = editaReservacionModal.querySelector('.modal-body #estatus')
    let inputComentario = editaReservacionModal.querySelector('.modal-body #comentarios')


    let url = "../administrador/getReservacion.php"
    let formData = new FormData()
    formData.append('id_reservacion', id)

    fetch(url, {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then(data => {
            inputId.value = data.id_reservacion
            inputNombre.value = data.nombreCliente
            inputPhone.value = data.phone
            inputSilla.value = data.numeroSillas
            inputMesa.value = data.tipoMesa
            inputFecha.value = data.fechaReservacion
            inputHora.value = data.horaReservacion
            inputEstatus.value = data.estatus
            inputComentario.value = data.comentarios
        }).catch(err => console.log(err))

})


eliminaReservacionModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')

    eliminaReservacionModal.querySelector('.modal-footer #id_reservacion').value = id

})
$(document).ready(function () {
    // Función para filtrar la tabla
    function filtrarTabla() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("buscarReservaciones"); // Cambiar el ID al del campo de búsqueda de usuarios
        filter = input.value.toUpperCase();
        table = document.getElementById("tablaReservaciones"); // Cambiar el ID al de la tabla de usuarios
        tr = table.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            tdID = tr[i].getElementsByTagName("td")[0];
            tdNombre = tr[i].getElementsByTagName("td")[1];
            tdCorreo = tr[i].getElementsByTagName("td")[3];

            if (tdID || tdNombre || tdCorreo) {
                txtID = tdID.textContent || tdID.innerText;
                txtNombre = tdNombre.textContent || tdNombre.innerText;
                txtCorreo = tdCorreo.textContent || tdCorreo.innerText;

                if (
                    txtID.toUpperCase().indexOf(filter) > -1 ||
                    txtNombre.toUpperCase().indexOf(filter) > -1 ||
                    txtCorreo.toUpperCase().indexOf(filter) > -1
                ) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }

    // Llamamos a la función cuando se escribe en el campo de búsqueda
    $("#buscarReservaciones").on("keyup", function () {
        filtrarTabla();
    });

    // También podemos llamar a la función al cargar la página para que la tabla se filtre desde el inicio
    filtrarTabla();
});



