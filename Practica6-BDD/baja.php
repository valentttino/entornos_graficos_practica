<?php
/* Baja de una ciudad */
require 'conexion.php';

$mensaje = "";
$error   = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = (int)$_POST['id'];
    $stmt = mysqli_prepare($link, "DELETE FROM Ciudades WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    if (mysqli_stmt_execute($stmt)) {
        if (mysqli_stmt_affected_rows($stmt) > 0) { $mensaje = "La ciudad se eliminó correctamente."; }
        else                                      { $error = "No existe una ciudad con ese id."; }
    } else {
        $error = "No se pudo eliminar: " . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
}

cabecera("Baja de ciudad");

if ($mensaje !== "") { echo '<p class="ok">' . h($mensaje) . '</p>'; }
if ($error !== "")   { echo '<p class="error">' . h($error) . '</p>'; }

$vResultado = mysqli_query($link, "SELECT id, ciudad, pais FROM Ciudades ORDER BY id")
    or die("Error en la consulta: " . mysqli_error($link));
?>
<table>
  <tr><th>id</th><th>ciudad</th><th>país</th><th>acción</th></tr>
<?php while ($fila = mysqli_fetch_array($vResultado)) { ?>
  <tr>
    <td><?php echo h($fila['id']); ?></td>
    <td><?php echo h($fila['ciudad']); ?></td>
    <td><?php echo h($fila['pais']); ?></td>
    <td>
      <form action="baja.php" method="post" onsubmit="return confirm('¿Eliminar esta ciudad?');">
        <input type="hidden" name="id" value="<?php echo (int)$fila['id']; ?>">
        <input type="submit" value="Eliminar">
      </form>
    </td>
  </tr>
<?php } ?>
</table>
<?php
mysqli_free_result($vResultado);
mysqli_close($link);
pie();
?>