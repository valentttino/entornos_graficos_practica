<?php
/* Ejercicio 6 - Busca el mail del alumno y guarda su nombre en una variable de sesión */
session_start();
require 'conexion.php';

$mensaje = '';
$error   = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $mail = trim(isset($_POST['mail']) ? $_POST['mail'] : '');

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $error = 'Ingrese un mail válido.';
    } else {
        $stmt = mysqli_prepare($link, "SELECT nombre FROM alumnos WHERE mail = ?");
        mysqli_stmt_bind_param($stmt, "s", $mail);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $nombre);

        if (mysqli_stmt_fetch($stmt)) {
            $_SESSION['nombre'] = $nombre;
            $mensaje = "Se encontró al alumno: $nombre. Su nombre quedó guardado en la sesión.";
        } else {
            $error = 'No existe un alumno con ese mail.';
        }
        mysqli_stmt_close($stmt);
    }
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 6 - Ingreso de alumno</title>
</head>
<body>
  <h1>Ingreso de alumno</h1>
  <?php if ($mensaje !== '') { echo '<p style="color:#006600;">' . h($mensaje) . '</p>'; } ?>
  <?php if ($error !== '')   { echo '<p style="color:#990000;">' . h($error) . '</p>'; } ?>

  <form action="index.php" method="post">
    <label>Mail del alumno: <input type="text" name="mail" size="35"></label>
    <input type="submit" value="Buscar">
  </form>

  <p><a href="bienvenida.php">Ir a la página de bienvenida</a></p>
</body>
</html>