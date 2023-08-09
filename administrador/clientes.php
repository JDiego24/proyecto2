<?php
// Debes tener en cuenta que este código es solo una representación del archivo y que es posible que necesites ajustarlo a tu base de datos y estructura real.

require '../php/conexion.php';
$conexion = conectar();

// Seguridad de sesiones
session_start();
error_reporting(0);

$varsesion = $_SESSION['tipo_usuario'];
if ($varsesion == null || $varsesion == '' || $varsesion != 'admin') {
    echo "No tienes autorización, debes iniciar sesión primero ";
    ?><a href="../index.html" class="btn btn-primary">Regresar </a><?php
    die();
}

// Obtener todos los usuarios (excepto administradores)
$sqlClientes = "SELECT * FROM users WHERE tipo_usuario != 'admin'";
$clientes = $conexion->query($sqlClientes);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes - Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/admin.css">

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 sidebar">
                <h2>Menú</h2>

                <a href="clientes.php"><i class="fas fa-users fa-2x mr-3 ml-3"></i>   Clientes</a>
                <a href="reservaciones.php"><i class="far fa-calendar-alt fa-2x mr-3"></i>   Reservaciones</a>
                <a href="../php/cerrar-sesion.php"><i class="fas fa-sign-out-alt fa-2x mr-3"></i>    Cerrar Sesión</a>
            </div>
            <div class="col-sm-9 content">
                <h2>Clientes registrados</h2>
                <br>
                <input type="text" class="form-control" id="buscarClientes" placeholder="Buscar cliente por nombre" width="auto">
                <br>
                <?php if(isset($_SESSION['msg']) && isset($_SESSION['color'])){?>
            <div class="alert alert-<?= $_SESSION['color'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                unset($_SESSION['color']);
                unset($_SESSION['msg']);
                } ?>

                <table id="tablaClientes" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre Cliente</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Contraseña</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_cliente = $clientes->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_cliente['id_user']; ?></td>
                                <td><?php echo $row_cliente['fullName']; ?></td>
                                <td><?php echo $row_cliente['phone']; ?></td>
                                <td><?php echo $row_cliente['email']; ?></td>
                                <td><?php echo $row_cliente['pass']; ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-id="<?=$row_cliente['id_user'];?>" data-bs-target="#editaClienteModal"><i class="fas fa-edit fa-1x mr-3"></i> Editar</a>
                                    <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-id="<?=$row_cliente['id_user'];?>" data-bs-target="#eliminaClienteModal" ><i class="fas fa-trash fa-1x mr-3"></i> Eliminar</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php include 'editaClienteModal.php'; ?>
    <?php include 'eliminaClienteModal.php'; ?>
    <script src="../js/jquery-3.7.0.min.js"></script>
            
    <script src="../js/modal_admin_clientes.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>

