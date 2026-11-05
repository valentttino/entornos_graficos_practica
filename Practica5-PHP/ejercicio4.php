<?php
/* Ejercicio 4 - Contar las páginas visitadas por un usuario durante su sesión.
   Se incluye con require al PRINCIPIO de cada página, antes de escribir
   cualquier texto o HTML (session_start() lo exige). */

session_start();

// Primera página de la sesión: se inicializan las variables de sesión
if (!isset($_SESSION['total_paginas'])) {
    $_SESSION['total_paginas']   = 0;
    $_SESSION['detalle_paginas'] = array();
}

// Se cuenta la página actual
$_SESSION['total_paginas']++;

$pagina = basename($_SERVER['PHP_SELF']);
if (!isset($_SESSION['detalle_paginas'][$pagina])) {
    $_SESSION['detalle_paginas'][$pagina] = 0;
}
$_SESSION['detalle_paginas'][$pagina]++;

// Muestra el total y el detalle por página
function mostrar_visitas() {
    echo "<p>Páginas visitadas en esta sesión: <strong>" . (int)$_SESSION['total_paginas'] . "</strong></p>";
    echo "<ul>";
    foreach ($_SESSION['detalle_paginas'] as $nombre => $cantidad) {
        echo "<li>" . htmlspecialchars($nombre) . ": " . (int)$cantidad . " vez/veces</li>";
    }
    echo "</ul>";
}
?>