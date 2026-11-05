<?php
/* Alta de una ciudad */
require 'conexion.php';

$errores  = array();
$guardado = false;
$ciudad = $pais = $habitantes = $superficie = "";
$tieneMetro = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
        $stmt = mysqli_prepare($link, "INSERT INTO Ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES (?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "ssidi", $ciudad, $pais, $hab, $sup, $tieneMetro);
        if (mysqli_stmt_execute($stmt)) {
            $guardado = true;
            $ciudad = $pais = $habitantes = $superficie = "";
            $tieneMetro = 0;
        } else {
            $errores[] = "No se pudo guardar: " . mysqli_error($link);
        }
        mysqli_stmt_close($stmt);
    }
}

cabecera("Alta de ciudad");

if ($guardado) { echo '<p class="ok">La ciudad se guardó correctamente.</p>'; }
foreach ($errores as $error) { echo '<p class="error">' . h($error) . '</p>'; }
?>
<form action="alta.php" method="post">
  <label>Ciudad: <input type="text" name="ciudad" value="<?php echo h($ciudad); ?>"></label>
  <label>País: <input type="text" name="pais" value="<?php echo h($pais); ?>"></label>
  <label>Habitantes: <input type="text" name="habitantes" value="<?php echo h($habitantes); ?>"></label>
  <label>Superficie: <input type="text" name="superficie" value="<?php echo h($superficie); ?>"></label>
  <label><input type="checkbox" name="tieneMetro" value="1" <?php echo $tieneMetro ? 'checked' : ''; ?>> Tiene metro</label>
  <input type="submit" value="Guardar">
</form>
<?php
mysqli_close($link);
pie();
?>