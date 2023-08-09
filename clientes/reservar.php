<?php

require '../php/conexion.php';
$conexion = conectar();

// Seguridad de sesiones
session_start();
error_reporting(0);

$varsesion = $_SESSION['tipo_usuario'];
if ($varsesion == null || $varsesion == '' || $varsesion != 'usuario') {
    echo "No tienes autorización, debes iniciar sesión primero ";
    ?><a href="../index.html" class="btn btn-primary">Regresar </a><?php
    die();
}
$id= $_SESSION['id_user'];
$sqlUsuario="SELECT * FROM users WHERE id_user='$id'";
$cliente = $conexion->query($sqlUsuario);
$row_cliente=$cliente->fetch_assoc();
$nombre = $row_cliente['fullName'];
$sqlReservaciones = "SELECT * FROM reservaciones WHERE id_usuario = '$id'";
$reservaciones = $conexion->query($sqlReservaciones);



?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Reservar</title>
  <script src="https://kit.fontawesome.com/283335a286.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@700&family=Mulish:wght@400;700&display=swap"
    rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/estilos.css" />
  <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>

<body>
  <header class="encabezado">
    <div class="contenedor-navegacion">
      <div class="contenido-navegacion contenedor">
        <div class="logo">
          <h2>
            Ristorante <span class="verde">Tu</span><span>ri</span><span class="rojo">lli</span>
          </h2>
        </div>
        <nav class="navegacion ocultar">
          <a href="../php/cerrar-sesion.php">Log Out</a>
          <a href="reservar.php">Reservar</a>

        </nav>
        <div class="hamburguesa"><span></span><span></span><span></span></div>
      </div>
    </div>
  </header>
  <div class="container-fluid">
    <br><br><br>
        <div class="row">
            
            <div class="col-sm-9 content">
            <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoReservacionModal"><i class="fas fa-plus-circle fa-1x"></i> Nueva Reservacion</a>

                <h2>Tus Reservaciones : <?php echo $nombre ?></h2>
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
                            <th>Nombre Cliente</th>
                            <th>Telefono</th>
                            <th>Numero sillas</th>
                            <th>Tipo de mesa</th>
                            <th>Fecha de reservacion</th>
                            <th>Hora reservacion</th>
                            <th>Champagne (Cortesia)</th>
                            <th>Comentarios</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row_reservacion = $reservaciones->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row_reservacion['nombreCliente']; ?></td>
                                <td><?php echo $row_reservacion['phone']; ?></td>
                                <td><?php echo $row_reservacion['numeroSillas']; ?></td>
                                <td><?php echo $row_reservacion['tipoMesa']; ?></td>
                                <td><?php echo $row_reservacion['fechaReservacion']; ?></td>
                                <td><?php echo $row_reservacion['horaReservacion']; ?></td>
                                <td><?php echo $row_reservacion['champagne']; ?></td>
                                <td><?php echo $row_reservacion['comentarios']; ?></td>
                                <td>
                                    <a href="" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-id="<?=$row_reservacion['id_reservacion'];?>" data-bs-target="#editaReservacionModal"><i class="fas fa-edit fa-1x mr-3"></i> Editar</a>
                                    <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-id="<?=$row_reservacion['id_reservacion'];?>" data-bs-target="#eliminaReservacionModal" ><i class="fas fa-trash fa-1x mr-3"></i>Cancelar </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <div class="container-form">
        <?php if(isset($_SESSION['msg']) && isset($_SESSION['color'])){?>
            <div class="alert alert-<?= $_SESSION['color'];?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg'];?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                unset($_SESSION['color']);
                unset($_SESSION['msg']);
                } ?>
          
        </div>

  <div class="pie-pagina">
    <div class="contenedor-piepagina contenedor">
      <div class="info">
        <h3>Dirección</h3>
        <p>Av. de la Cultura 69, Cd del Valle, 63157 Tepic, Nay.</p>
      </div>
      <div class="info">
        <h3>Días especiales</h3>
        <p>Sabados y Jueves 7am - 11pm</p>
        <p>+523112751358</p>
      </div>
      <div class="info">
        <h3>Horarios</h3>
        <p>Lunes - Domingo 7am - 11pm</p>
        <div class="redes-sociales redes-pie">
          <i class="fab fa-facebook-square"></i>
          <i class="fab fa-twitter-square"></i>
          <i class="fab fa-instagram"></i>
        </div>
      </div>
      <div class="info">
        <h3>Noticias</h3>
        <p>suscribete para recibir más noticias</p>
        <input type="email" placeholder="Tu correo" />
        <input type="submit" class="btn btn-verde" value="Suscribirse" />
      </div>
    </div>
  </div>
    <?php include 'nuevoReservacionModal.php'; ?>
    <?php include 'editaReservacionModal.php'; ?>
    <?php include 'eliminaReservacionModal.php'; ?>
    <script src="../js/jquery-3.7.0.min.js"></script>
            

<script src="../js/bootstrap.min.js"></script>
  <script src="../js/app.js"></script>
  <script src="../js/modal_cliente.js"></script>
</body>

</html>