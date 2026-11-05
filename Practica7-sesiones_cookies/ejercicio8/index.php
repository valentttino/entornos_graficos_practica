<?php
/* Ejercicio 8 - Buscador de canciones */
require 'conexion.php';

$q = trim(isset($_GET['q']) ? $_GET['q'] : '');
$buscado = ($q !== '');
$resultados = array();

if ($buscado) {
    $patron = '%' . addcslashes($q, '%_\\') . '%';
    $stmt = mysqli_prepare($link, "SELECT canciones FROM buscador WHERE canciones LIKE ? ORDER BY canciones");
    mysqli_stmt_bind_param($stmt, "s", $patron);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $cancion);
    while (mysqli_stmt_fetch($stmt)) {
        $resultados[] = $cancion;
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 8 - Buscador de canciones</title>
</head>
<body>
  <h1>Buscador de canciones</h1>

  <form action="index.php" method="get">
    <label>Canción: <input type="text" name="q" value="<?php echo h($q); ?>"></label>
    <input type="submit" value="Buscar">
  </form>

  <?php if ($buscado) { ?>
    <?php if (count($resultados) > 0) { ?>
      <p><?php echo count($resultados); ?> resultado(s) para "<?php echo h($q); ?>":</p>
      <ul>
        <?php foreach ($resultados as $c) { echo '<li>' . h($c) . '</li>'; } ?>
      </ul>
    <?php } else { ?>
      <p>No se encontraron canciones que contengan "<?php echo h($q); ?>".</p>
    <?php } ?>
  <?php } ?>
</body>
</html>