<?php
/* Ejercicio 4 - Tercera página: borra la cookie "titular" */
// Se borra enviando la misma cookie con una fecha de vencimiento en el pasado
setcookie('titular', '', time() - 3600);
unset($_COOKIE['titular']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Preferencia borrada</title>
</head>
<body>
  <h1>Preferencia borrada</h1>
  <p>La cookie fue eliminada. En la próxima visita se mostrarán los tres titulares.</p>
  <p><a href="index.php">Volver al periódico</a></p>
</body>
</html>