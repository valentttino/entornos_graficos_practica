<?php
/* Tercera página: verifica si existe la variable de sesión */
session_start();
function h($t) { return htmlspecialchars((string)$t, ENT_QUOTES, 'UTF-8'); }

if (isset($_GET['salir'])) {
    unset($_SESSION['nombre']);
    header('Location: bienvenida.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 6 - Bienvenida</title>
</head>
<body>
  <?php if (isset($_SESSION['nombre'])) { ?>
    <h1>¡Bienvenido/a, <?php echo h($_SESSION['nombre']); ?>!</h1>
    <p><a href="bienvenida.php?salir=1">Cerrar sesión</a></p>
  <?php } else { ?>
    <h1>Acceso denegado</h1>
    <p>No puede visitar esta página: primero debe ingresar el mail de un alumno.</p>
  <?php } ?>
  <p><a href="index.php">Volver al formulario</a></p>
</body>
</html>