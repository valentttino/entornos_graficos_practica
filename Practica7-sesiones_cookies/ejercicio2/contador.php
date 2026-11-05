<?php
/* Ejercicio 2 - Cookie "contador": cuenta del lado del cliente las visitas a esta página */
if (isset($_COOKIE['contador'])) {
    $visitas = (int)$_COOKIE['contador'] + 1;
    $primeraVez = false;
} else {
    $visitas = 1;
    $primeraVez = true;
}
// La cookie se envía antes de cualquier salida HTML; dura 1 año
setcookie('contador', (string)$visitas, time() + 60 * 60 * 24 * 365);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 2 - Contador con cookie</title>
</head>
<body>
  <h1>Contador de visitas</h1>
  <?php if ($primeraVez) { ?>
    <p>¡Bienvenido! Es la primera vez que visitás esta página.</p>
  <?php } else { ?>
    <p>Visitaste esta página <strong><?php echo $visitas; ?></strong> veces.</p>
  <?php } ?>
  <p><a href="contador.php">Volver a cargar la página</a></p>
</body>
</html>