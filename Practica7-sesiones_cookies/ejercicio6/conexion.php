<?php
$servidor = "localhost"; $usuario = "root"; $clave = ""; $baseDatos = "bdd";
mysqli_report(MYSQLI_REPORT_OFF);
$link = mysqli_connect($servidor, $usuario, $clave)
    or die("No se pudo conectar con el servidor: " . mysqli_connect_error());
mysqli_select_db($link, $baseDatos)
    or die("No se pudo seleccionar la base de datos: " . mysqli_error($link));
mysqli_set_charset($link, "utf8mb4");

function h($t) { return htmlspecialchars((string)$t, ENT_QUOTES, 'UTF-8'); }
?>