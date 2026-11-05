<?php
/* Ejercicio 1 - Estilo CSS elegido por el usuario y recordado con una cookie */
$estilos = array('claro' => 'Claro', 'oscuro' => 'Oscuro', 'azul' => 'Azul');
$estiloActual = 'claro';

// Al enviar el formulario se guarda la cookie (antes de escribir cualquier HTML)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $elegido = isset($_POST['estilo']) ? $_POST['estilo'] : '';
    if (isset($estilos[$elegido])) {
        setcookie('estilo', $elegido, time() + 60 * 60 * 24 * 30);   // dura 30 días
    }
    header('Location: index.php');   // recarga la página para que ya lea la cookie nueva
    exit;
}

if (isset($_COOKIE['estilo']) && isset($estilos[$_COOKIE['estilo']])) {
    $estiloActual = $_COOKIE['estilo'];
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 1 - Estilos con cookie</title>
  <link rel="stylesheet" href="estilos/<?php echo $estiloActual; ?>.css">
</head>
<body>
  <h1>Mi página personalizable</h1>
  <p>El aspecto que elijas se recuerda entre visitas: cerrá el navegador, volvé a entrar y vas a ver el mismo estilo.</p>

  <form action="index.php" method="post">
    <p>Elegí el aspecto de la página:</p>
    <?php foreach ($estilos as $clave => $nombre) { ?>
      <label>
        <input type="radio" name="estilo" value="<?php echo $clave; ?>" <?php echo ($clave === $estiloActual) ? 'checked' : ''; ?>>
        <?php echo $nombre; ?>
      </label><br>
    <?php } ?>
    <p><input type="submit" value="Aplicar estilo"></p>
  </form>
</body>
</html>