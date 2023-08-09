$('#registrar').click(function (event) {
  event.preventDefault();

  const fullName = document.getElementById("full-name").value;
  const phone = document.getElementById("phone").value;
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;

  // Validar el nombre completo (solo letras y espacios)
  if (!/^[a-zA-Z\s]+$/.test(fullName)) {
    showErrorAlert("Ingresa un nombre válido (solo letras y espacios).");
    return false;
  } else if (!/^\d{10}$/.test(phone)) {   // Validar el número de teléfono (10 dígitos numéricos)

    showErrorAlert("Ingresa un número de teléfono válido (10 dígitos numéricos).");
    return false;
  } else if (!/^\S+@\S+\.\S+$/.test(email)) {// Validar el correo electrónico (formato de email válido)
    showErrorAlert("Ingresa un correo electrónico válido.");
    return false;
  } else if (password.length < 8) {// Validar la contraseña (mínimo 8 caracteres)
    showErrorAlert("La contraseña debe tener al menos 8 caracteres.");
    return false;
  } else {
    $.ajax({
      url: "php/registro-usuario.php",
      type: "POST",
      data: { fullName: fullName, phone: phone, email: email, pass: password },
      success: function (data) {
        console.log("Ajax success", data);
        if (data == 1) {
          showSuccessAlert("Exito", "Gracias por registrarte", "success");
          location.href = '../login.html';

        } else {
          showErrorAlert("Error", "Registro Fallido", "error");
        }
        $('input').val('');
      }
    });
  }
});








function showErrorAlert(message) {
  Swal.fire({
    icon: "error",
    title: "Error",
    text: message,
    confirmButtonText: "Cerrar"
  });
}

function showSuccessAlert(message) {
  Swal.fire({
    icon: "success",
    title: "Correcto",
    text: message,
    confirmButtonText: "Cerrar"
  });
}

$('#login').click(function (event) {
  event.preventDefault();

  let email = document.getElementById('email');
  let password = document.getElementById('password');
  if (email.length == 0 || password.value.length == 0) {
    showErrorAlert("Error", "No dejes espacios vacios", "error");
    return false;
  } else {
    let datos = new FormData();
    datos.append("email", email.value);
    datos.append("password", password.value);

    fetch('php/validar.php', {
      method: 'POST',
      body: datos
    }).then(response => response.json())
      .then(({ success, tipo, message }) => {
        if (success === 1) {
          if (tipo === 2) {
            showSuccessAlert("Exito", "Bienvenido Admin", "success");
            location.href = 'administrador/clientes.php';
          } else {
            showSuccessAlert("Exito", "Bienvenido Cliente", "success");
            location.href = 'clientes/clientes_interfaz.php';
          }
        } else {
          showErrorAlert("Error", "No se pudo verificar", "error");
        }
      })
  }
});