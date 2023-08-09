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



?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Ristorante Italiano</title>
  <script src="https://kit.fontawesome.com/283335a286.js" crossorigin="anonymous"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@700&family=Mulish:wght@400;700&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="../css/normalize.css" />
  <link rel="stylesheet" href="../css/estilos.css" />
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

  <div class="contenido-header">
    <div class="contenedor-encabezado">
      <div class="texto-encabezado">
      <?php echo '<h2>BENVENUTO ' .  $nombre. '</h2>' ?>
        <a href="reservar.php" class="btn bordes">Prenotare</a>
      </div>
      <video autoplay loop muted>
        <source src="../img/bg_video.mp4" />
      </video>
    </div>
  </div>


  <div class="separador">
    <div class="contenido-separador contenedor">
      <h2 id="seccion2">Comida italiana para empezar el día</h2>
      <p>Empieza tu día comiedo deliciosa comida o un café italiano</p>
      <a href="#" class="btn btn-verde">Encuentranos</a>
    </div>
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

  <script src="../js/app.js"></script>
</body>

</html>