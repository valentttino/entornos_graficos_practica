<?php
/* Página 2: crea las dos variables de sesión */
session_start();   // debe ir antes de cualquier salida

$creadas = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario']) && isset($_POST['clave'])) {
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['clave']   = $_POST['clave'];
    $creadas = true;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 5 - Página 2</title>
</head>
<body>
  <h1>Página 2: variables de sesión</h1>
  <?php if ($creadas) { ?>
    <p>Se crearon las variables de sesión <code>$_SESSION['usuario']</code> y <code>$_SESSION['clave']</code>.</p>
    <p><a href="pagina3.php">Ir a la página 3</a></p>
  <?php } else { ?>
    <p>No se recibieron datos. <a href="pagina1.php">Volver al formulario</a></p>
  <?php } ?>
</body>
</html>