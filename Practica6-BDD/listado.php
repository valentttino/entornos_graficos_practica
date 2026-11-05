<?php
/* Listado completo (sin paginación) */
require 'conexion.php';

cabecera("Listado de ciudades");

$vResultado = mysqli_query($link, "SELECT id, ciudad, pais, habitantes, superficie, tieneMetro FROM Ciudades ORDER BY id")
    or die("Error en la consulta: " . mysqli_error($link));
?>
<p>Total de ciudades: <?php echo mysqli_num_rows($vResultado); ?></p>
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
<?php
mysqli_free_result($vResultado);
mysqli_close($link);
pie();
?>