<?php
/* Ejercicio 2 - Página de Contacto: formulario para enviar consultas al webmaster */

$webmaster = "webmaster@ejemplo.com";

$errores  = array();
$enviado  = false;
$nombre = $email = $asunto = $consulta = "";

function h($texto) {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre   = trim(isset($_POST['nombre'])   ? $_POST['nombre']   : '');
    $email    = trim(isset($_POST['email'])    ? $_POST['email']    : '');
    $asunto   = trim(isset($_POST['asunto'])   ? $_POST['asunto']   : '');
    $consulta = trim(isset($_POST['consulta']) ? $_POST['consulta'] : '');

    if ($nombre === '')   { $errores[] = "Ingrese su nombre."; }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { $errores[] = "Ingrese un e-mail válido."; }
    if ($asunto === '')   { $errores[] = "Ingrese el asunto."; }
    if ($consulta === '') { $errores[] = "Escriba su consulta."; }

    // Evita la inyección de cabeceras (saltos de línea en campos que van a las cabeceras)
    if (preg_match('/[\r\n]/', $nombre . $email . $asunto)) {
        $errores[] = "Los datos ingresados contienen caracteres no permitidos.";
    }

    if (count($errores) === 0) {
        $cuerpo  = "Consulta recibida desde el sitio web\r\n\r\n";
        $cuerpo .= "Nombre: $nombre\r\n";
        $cuerpo .= "E-mail: $email\r\n\r\n";
        $cuerpo .= $consulta . "\r\n";

        $cabeceras  = "MIME-Version: 1.0\r\n";
        $cabeceras .= "Content-Type: text/plain; charset=UTF-8\r\n";
        $cabeceras .= "From: Sitio Web <no-responder@ejemplo.com>\r\n";
        $cabeceras .= "Reply-To: $email\r\n";

        $asuntoMail = "=?UTF-8?B?" . base64_encode("Consulta web: " . $asunto) . "?=";

        $enviado = mail($webmaster, $asuntoMail, $cuerpo, $cabeceras);
        if (!$enviado) {
            $errores[] = "No se pudo enviar la consulta. Intente nuevamente más tarde.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Contacto</title>
</head>
<body>
  <h1>Contacto</h1>

  <?php if ($enviado): ?>
    <p><strong>¡Gracias por su consulta!</strong> El webmaster la recibió y le responderá a la brevedad.</p>
  <?php else: ?>

    <?php if (count($errores) > 0): ?>
      <ul style="color:#990000;">
        <?php foreach ($errores as $error): ?>
          <li><?php echo h($error); ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>

    <form action="<?php echo h($_SERVER['PHP_SELF']); ?>" method="post">
      <p>
        <label>Nombre:<br>
          <input type="text" name="nombre" size="40" value="<?php echo h($nombre); ?>"></label>
      </p>
      <p>
        <label>E-mail:<br>
          <input type="text" name="email" size="40" value="<?php echo h($email); ?>"></label>
      </p>
      <p>
        <label>Asunto:<br>
          <input type="text" name="asunto" size="40" value="<?php echo h($asunto); ?>"></label>
      </p>
      <p>
        <label>Consulta:<br>
          <textarea name="consulta" rows="6" cols="50"><?php echo h($consulta); ?></textarea></label>
      </p>
      <p>
        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
      </p>
    </form>
  <?php endif; ?>
</body>
</html>