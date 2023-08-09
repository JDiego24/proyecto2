<?php
include 'conexion.php';
$conexion = conectar();

$response = array();

if (isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['password']) && !empty($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    session_start();

    $query_tipo = "SELECT tipo_usuario FROM users WHERE email='$email' AND pass='$password'";
    $result_tipo = mysqli_query($conexion, $query_tipo);
    $row = mysqli_fetch_assoc($result_tipo);
    $tipo = $row['tipo_usuario'];

    $_SESSION['tipo_usuario'] = $tipo;

    $query = "SELECT * FROM users WHERE email ='$email' AND pass='$password'";
    $result = mysqli_query($conexion, $query);
    $row_u = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $id = $row_u['id_user'];
        $_SESSION['id_user'] = $id;

        if ($tipo == "admin") {
            $response['success'] = 1;
            $response['tipo'] = 2;
        } else {
            $response['success'] = 1;
            $response['tipo'] = 3;
        }
    } else {
        $response['success'] = 3;
        $response['message'] = "Email o contraseña incorrectos";
    }
} else {
    $response['success'] = 0;
    $response['message'] = "Por favor, completa todos los campos";
}
//file_put_contents('log.txt', $contenido, FILE_APPEND);

echo json_encode($response);
?>
