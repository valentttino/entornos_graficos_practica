<?php
/* Página 3: recupera los valores guardados en la sesión */
session_start();
function h($t) { return htmlspecialchars((string)$t, ENT_QUOTES, 'UTF-8'); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 5 - Página 3</title>
</head>
<body>
  <h1>Página 3: valores recuperados</h1>
  <?php if (isset($_SESSION['usuario']) && isset($_SESSION['clave'])) { ?>
    <p>Usuario: <strong><?php echo h($_SESSION['usuario']); ?></strong></p>
    <p>Clave: <strong><?php echo h($_SESSION['clave']); ?></strong></p>
  <?php } else { ?>
    <p>No hay datos en la sesión. <a href="pagina1.php">Volver a la página 1</a></p>
  <?php } ?>
</body>
</html>