<?php
/* Listado con paginación (5 ciudades por página) */
require 'conexion.php';

$porPagina = 5;

// Cantidad total de registros y de páginas
$vTotal = mysqli_query($link, "SELECT COUNT(*) FROM Ciudades")
    or die("Error en la consulta: " . mysqli_error($link));
$filaTotal = mysqli_fetch_array($vTotal);
$total     = (int)$filaTotal[0];
mysqli_free_result($vTotal);

$paginas = max(1, (int)ceil($total / $porPagina));

// Página pedida (validada entre 1 y la última)
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1)        { $pagina = 1; }
if ($pagina > $paginas) { $pagina = $paginas; }

$desde = ($pagina - 1) * $porPagina;

$sql = "SELECT id, ciudad, pais, habitantes, superficie, tieneMetro
        FROM Ciudades ORDER BY id LIMIT $porPagina OFFSET $desde";
$vResultado = mysqli_query($link, $sql)
    or die("Error en la consulta: " . mysqli_error($link));

cabecera("Listado de ciudades (con paginación)");
?>
<p>Página <?php echo $pagina; ?> de <?php echo $paginas; ?> (<?php echo $total; ?> ciudades en total)</p>
<table>
  <tr>
    <th>id</th><th>ciudad</th><th>país</th><th>habitantes</th><th>superficie</th><th>tieneMetro</th>
  </tr>
<?php while ($fila = mysqli_fetch_array($vResultado)) { ?>
  <tr>
    <td><?php echo h($fila['id']); ?></td>
    <td><?php echo h($fila['ciudad']); ?></td>
    <td><?php echo h($fila['pais']); ?></td>
    <td><?php echo h($fila['habitantes']); ?></td>
    <td><?php echo h($fila['superficie']); ?></td>
    <td><?php echo h($fila['tieneMetro']); ?></td>
  </tr>
<?php } ?>
</table>

<p class="paginas">
<?php if ($pagina > 1) { ?>
  <a href="?pagina=<?php echo $pagina - 1; ?>">&laquo; Anterior</a>
<?php } ?>
<?php for ($i = 1; $i <= $paginas; $i++) {
    if ($i == $pagina) { echo "<strong>$i</strong>"; }
    else               { echo "<a href=\"?pagina=$i\">$i</a>"; }
} ?>
<?php if ($pagina < $paginas) { ?>
  <a href="?pagina=<?php echo $pagina + 1; ?>">Siguiente &raquo;</a>
<?php } ?>
</p>
<?php
mysqli_free_result($vResultado);
mysqli_close($link);
pie();
?>