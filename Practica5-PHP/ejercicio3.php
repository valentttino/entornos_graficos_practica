<?php
/* Ejercicio 3 - Recomendar el sitio a un amigo */

$urlSitio    = "http://es.wikipedia.org/";   // dirección del sitio a recomendar
$nombreSitio = "Wikipedia"; 

$errores = array();
$enviado = false;
$tuNombre = $tuEmail = $amigoNombre = $amigoEmail = $comentario = "";

function h($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tuNombre    = trim(isset($_POST['tu_nombre'])    ? $_POST['tu_nombre']    : '');
    $tuEmail     = trim(isset($_POST['tu_email'])     ? $_POST['tu_email']     : '');
    $amigoNombre = trim(isset($_POST['amigo_nombre']) ? $_POST['amigo_nombre'] : '');
    $amigoEmail  = trim(isset($_POST['amigo_email'])  ? $_POST['amigo_email']  : '');
    $comentario  = trim(isset($_POST['comentario'])   ? $_POST['comentario']   : '');

    if ($tuNombre === '')    { $errores[] = "Ingrese su nombre."; }
    if (!filter_var($tuEmail, FILTER_VALIDATE_EMAIL))    { $errores[] = "Ingrese su e-mail (válido)."; }
    if ($amigoNombre === '') { $errores[] = "Ingrese el nombre de su amigo."; }
    if (!filter_var($amigoEmail, FILTER_VALIDATE_EMAIL)) { $errores[] = "Ingrese un e-mail válido para su amigo."; }

    // Evita la inyección de cabeceras
    if (preg_match('/[\r\n]/', $tuNombre . $tuEmail . $amigoNombre . $amigoEmail)) {
        $errores[] = "Los datos ingresados contienen caracteres no permitidos.";
    }

    if (count($errores) === 0) {
        $cuerpo  = "Hola $amigoNombre:\r\n\r\n";
        $cuerpo .= "$tuNombre te recomienda visitar $nombreSitio.\r\n";
        $cuerpo .= "Podés ingresar en: $urlSitio\r\n";
        if ($comentario !== '') {
            $cuerpo .= "\r\nMensaje de $tuNombre:\r\n$comentario\r\n";
        }

        $cabeceras  = "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $cabeceras .= "From: $nombreSitio <no-responder@ejemplo.com>\r\n";
        $cabeceras .= "Reply-To: $tuEmail\r\n";

        $asunto = "=?UTF-8?B?" . base64_encode("$tuNombre te recomienda $nombreSitio") . "?=";

        $enviado = mail($amigoEmail, $asunto, $cuerpo, $cabeceras);
        if (!$enviado) {
            $errores[] = "No se pudo enviar la recomendación. Intente nuevamente más tarde.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Recomendar el sitio a un amigo</title>
</head>
<body>
  <h1>Recomendar este sitio a un amigo</h1>

  <?php if ($enviado): ?>
    <p><strong>¡Listo!</strong> Le enviamos la recomendación a <?php echo h($amigoNombre); ?>.</p>
    <p><a href="<?php echo h($_SERVER['PHP_SELF']); ?>">Recomendar a otra persona</a></p>
  <?php else: ?>

    <?php if (count($errores) > 0): ?>
      <ul style="color:#990000;">
        <?php foreach ($errores as $error): ?>
          <li><?php echo h($error); ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <form action="<?php echo h($_SERVER['PHP_SELF']); ?>" method="post">
      <p><label>Su nombre:<br>
        <input type="text" name="tu_nombre" size="40" value="<?php echo h($tuNombre); ?>"></label></p>
      <p><label>Su e-mail:<br>
        <input type="text" name="tu_email" size="40" value="<?php echo h($tuEmail); ?>"></label></p>
      <p><label>Nombre de su amigo:<br>
        <input type="text" name="amigo_nombre" size="40" value="<?php echo h($amigoNombre); ?>"></label></p>
      <p><label>E-mail de su amigo:<br>
        <input type="text" name="amigo_email" size="40" value="<?php echo h($amigoEmail); ?>"></label></p>
      <p><label>Mensaje (opcional):<br>
        <textarea name="comentario" rows="4" cols="50"><?php echo h($comentario); ?></textarea></label></p>
      <p><input type="submit" value="Recomendar"></p>
    </form>
  <?php endif; ?>
</body>
</html>