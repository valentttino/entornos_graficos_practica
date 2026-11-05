<?php
/* Modificación de una ciudad: lista con enlace "Modificar" y formulario de edición */
require 'conexion.php';

$errores    = array();
$modificado = false;

$id = 0;
if (isset($_POST['id']))     { $id = (int)$_POST['id']; }
elseif (isset($_GET['id']))  { $id = (int)$_GET['id']; }

// Guardar los cambios
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $id > 0) {
    $ciudad     = trim(isset($_POST['ciudad'])     ? $_POST['ciudad']     : '');
    $pais       = trim(isset($_POST['pais'])       ? $_POST['pais']       : '');
    $habitantes = trim(isset($_POST['habitantes']) ? $_POST['habitantes'] : '');
    $superficie = trim(isset($_POST['superficie']) ? $_POST['superficie'] : '');
    $tieneMetro = isset($_POST['tieneMetro']) ? 1 : 0;

    if ($ciudad === '')            { $errores[] = "Ingrese la ciudad."; }
    if ($pais === '')              { $errores[] = "Ingrese el país."; }
    if (!ctype_digit($habitantes)) { $errores[] = "Los habitantes deben ser un número entero positivo."; }
    if (!is_numeric($superficie) || $superficie < 0) { $errores[] = "La superficie debe ser un número positivo (con punto decimal)."; }

    if (count($errores) === 0) {
        $hab = (int)$habitantes;
        $sup = (float)$superficie;
        $stmt = mysqli_prepare($link, "UPDATE Ciudades SET ciudad = ?, pais = ?, habitantes = ?, superficie = ?, tieneMetro = ? WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "ssidii", $ciudad, $pais, $hab, $sup, $tieneMetro, $id);
        if (mysqli_stmt_execute($stmt)) { $modificado = true; }
        else { $errores[] = "No se pudo modificar: " . mysqli_error($link); }
        mysqli_stmt_close($stmt);
    }
}

cabecera("Modificación de ciudad");

if ($modificado) {
    echo '<p class="ok">Los datos se modificaron correctamente.</p>';
    $id = 0;   // vuelve a mostrar la lista
}
foreach ($errores as $error) { echo '<p class="error">' . h($error) . '</p>'; }

// Datos actuales de la ciudad elegida
$fila = null;
if ($id > 0) {
    $vUna = mysqli_query($link, "SELECT * FROM Ciudades WHERE id = " . $id)
        or die("Error en la consulta: " . mysqli_error($link));
    $fila = mysqli_fetch_array($vUna);
    mysqli_free_result($vUna);
    if (!$fila) { echo '<p class="error">No existe una ciudad con ese id.</p>'; }
}

if ($fila) {
    // Si hubo errores se vuelven a mostrar los valores escritos
    $vCiudad = count($errores) ? $ciudad     : $fila['ciudad'];
    $vPais   = count($errores) ? $pais       : $fila['pais'];
    $vHab    = count($errores) ? $habitantes : $fila['habitantes'];
    $vSup    = count($errores) ? $superficie : $fila['superficie'];
    $vMetro  = count($errores) ? $tieneMetro : $fila['tieneMetro'];
?>
<form action="modificar.php" method="post">
  <input type="hidden" name="id" value="<?php echo (int)$fila['id']; ?>">
  <label>Ciudad: <input type="text" name="ciudad" value="<?php echo h($vCiudad); ?>"></label>
  <label>País: <input type="text" name="pais" value="<?php echo h($vPais); ?>"></label>
  <label>Habitantes: <input type="text" name="habitantes" value="<?php echo h($vHab); ?>"></label>
  <label>Superficie: <input type="text" name="superficie" value="<?php echo h($vSup); ?>"></label>
  <label><input type="checkbox" name="tieneMetro" value="1" <?php echo $vMetro ? 'checked' : ''; ?>> Tiene metro</label>
  <input type="submit" value="Guardar cambios">
  <a href="modificar.php">Cancelar</a>
</form>
<?php
} else {
    $vResultado = mysqli_query($link, "SELECT id, ciudad, pais FROM Ciudades ORDER BY id")
        or die("Error en la consulta: " . mysqli_error($link));
?>
<table>
  <tr><th>id</th><th>ciudad</th><th>país</th><th>acción</th></tr>
<?php while ($f = mysqli_fetch_array($vResultado)) { ?>
  <tr>
    <td><?php echo h($f['id']); ?></td>
    <td><?php echo h($f['ciudad']); ?></td>
    <td><?php echo h($f['pais']); ?></td>
    <td><a href="modificar.php?id=<?php echo (int)$f['id']; ?>">Modificar</a></td>
  </tr>
<?php } ?>
</table>
<?php
    mysqli_free_result($vResultado);
}
mysqli_close($link);
pie();
?>