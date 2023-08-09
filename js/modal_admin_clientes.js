//MODAL CLIENTES

let editaClienteModal = document.getElementById('editaClienteModal')
let eliminaClienteModal = document.getElementById('eliminaClienteModal')


editaClienteModal.addEventListener('hide.bs.modal', event => {
    editaClienteModal.querySelector('.modal-body #full-name').value = ""
    editaClienteModal.querySelector('.modal-body #phone').value = ""
    editaClienteModal.querySelector('.modal-body #email').value = ""
    editaClienteModal.querySelector('.modal-body #password').value = ""
})

editaClienteModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')

    let inputId = editaClienteModal.querySelector('.modal-body #id_user')
    let inputNombre = editaClienteModal.querySelector('.modal-body #full-name')
    let inputPhone = editaClienteModal.querySelector('.modal-body #phone')
    let inputEmail = editaClienteModal.querySelector('.modal-body #email')
    let inputPassword = editaClienteModal.querySelector('.modal-body #password')


    let url = "../administrador/getClientes.php"
    let formData = new FormData()
    formData.append('id_user', id)

    fetch(url, {
        method: "POST",
        body: formData
    }).then(response => response.json())
        .then(data => {
            inputId.value = data.id_user
            inputNombre.value = data.fullName
            inputPhone.value = data.phone
            inputEmail.value = data.email
            inputPassword.value = data.pass
        }).catch(err => console.log(err))

})


eliminaClienteModal.addEventListener('shown.bs.modal', event => {
    let button = event.relatedTarget
    let id = button.getAttribute('data-bs-id')

    eliminaClienteModal.querySelector('.modal-footer #id_user').value = id

})
$(document).ready(function () {
    // Función para filtrar la tabla
    function filtrarTabla() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("buscarClientes"); // Cambiar el ID al del campo de búsqueda de usuarios
        filter = input.value.toUpperCase();
        table = document.getElementById("tablaClientes"); // Cambiar el ID al de la tabla de usuarios
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
    $("#buscarClientes").on("keyup", function () {
        filtrarTabla();
    });

    // También podemos llamar a la función al cargar la página para que la tabla se filtre desde el inicio
    filtrarTabla();
});