<?php
/* Ejercicio 1 - Enviar un correo electrónico con formato HTML usando mail() */

$destinatario = "destinatario@ejemplo.com";
$asunto       = "Prueba de correo con formato HTML";

// Cuerpo del mensaje en HTML
$cuerpo = '
<html>
<head><title>Correo de prueba</title></head>
<body>
  <h1 style="color:#006666;">Hola desde PHP</h1>
  <p>Este mensaje se envió <b>a través del servidor</b> con formato <i>HTML</i>.</p>
  <table border="1" cellpadding="4">
    <tr><th>Dato</th><th>Valor</th></tr>
    <tr><td>Fecha de envío</td><td>' . date('d/m/Y H:i') . '</td></tr>
  </table>
</body>
</html>';

// Para que el correo se interprete como HTML hacen falta estas cabeceras
$cabeceras  = "MIME-Version: 1.0\r\n";
$cabeceras .= "Content-Type: text/html; charset=UTF-8\r\n";
$cabeceras .= "From: Sitio Web <no-responder@ejemplo.com>\r\n";

// Asunto codificado para que admita tildes y caracteres especiales
$asuntoCodificado = "=?UTF-8?B?" . base64_encode($asunto) . "?=";

if (mail($destinatario, $asuntoCodificado, $cuerpo, $cabeceras)) {
    echo "El correo fue aceptado por el servidor para su envío.";
} else {
    echo "No se pudo enviar el correo. Revisar la configuración de mail() en php.ini.";
}
?>