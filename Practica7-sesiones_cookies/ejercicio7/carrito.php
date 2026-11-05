<?php
/* Ejercicio 7 - Carrito de compras (los productos elegidos se guardan en la sesión) */
session_start();
require 'conexion.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();   // id del producto => cantidad
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = isset($_POST['accion']) ? $_POST['accion'] : '';
    $id     = isset($_POST['id']) ? (int)$_POST['id'] : 0;

    if ($accion === 'agregar' && $id > 0) {
        // Se verifica que el producto exista en el catálogo
        $stmt = mysqli_prepare($link, "SELECT id FROM catalogo WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        if (mysqli_stmt_num_rows($stmt) === 1) {
            $_SESSION['carrito'][$id] = (isset($_SESSION['carrito'][$id]) ? $_SESSION['carrito'][$id] : 0) + 1;
        }
        mysqli_stmt_close($stmt);
    } elseif ($accion === 'quitar') {
        unset($_SESSION['carrito'][$id]);
    } elseif ($accion === 'vaciar') {
        $_SESSION['carrito'] = array();
    }
    header('Location: carrito.php');   // evita reenviar el formulario al recargar
    exit;
}

$items = array();
$total = 0;
if (count($_SESSION['carrito']) > 0) {
    $ids = implode(',', array_map('intval', array_keys($_SESSION['carrito'])));
    $vResultado = mysqli_query($link, "SELECT id, producto, precio FROM catalogo WHERE id IN ($ids) ORDER BY producto")
        or die("Error en la consulta: " . mysqli_error($link));
    while ($fila = mysqli_fetch_array($vResultado)) {
        $cantidad = (int)$_SESSION['carrito'][$fila['id']];
        $subtotal = (float)$fila['precio'] * $cantidad;
        $total   += $subtotal;
        $items[]  = array('id' => $fila['id'], 'producto' => $fila['producto'], 'precio' => (float)$fila['precio'],
                          'cantidad' => $cantidad, 'subtotal' => $subtotal);
    }
    mysqli_free_result($vResultado);
}
mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 7 - Carrito</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    table { border-collapse: collapse; }
    th, td { border: 1px solid #999; padding: 4px 12px; }
    th { background: #ddd; }
    td.num { text-align: right; }
  </style>
</head>
<body>
  <h1>Mi carrito</h1>
  <p><a href="index.php">&larr; Seguir comprando</a></p>

  <?php if (count($items) === 0) { ?>
    <p>El carrito está vacío.</p>
  <?php } else { ?>
    <table>
      <tr><th>Producto</th><th>Precio</th><th>Cantidad</th><th>Subtotal</th><th></th></tr>
      <?php foreach ($items as $it) { ?>
        <tr>
          <td><?php echo h($it['producto']); ?></td>
          <td class="num">$ <?php echo number_format($it['precio'], 2, ',', '.'); ?></td>
          <td class="num"><?php echo $it['cantidad']; ?></td>
          <td class="num">$ <?php echo number_format($it['subtotal'], 2, ',', '.'); ?></td>
          <td>
            <form action="carrito.php" method="post">
              <input type="hidden" name="accion" value="quitar">
              <input type="hidden" name="id" value="<?php echo (int)$it['id']; ?>">
              <input type="submit" value="Quitar">
            </form>
          </td>
        </tr>
      <?php } ?>
      <tr>
        <td colspan="3"><strong>Total</strong></td>
        <td class="num"><strong>$ <?php echo number_format($total, 2, ',', '.'); ?></strong></td>
        <td></td>
      </tr>
    </table>
    <form action="carrito.php" method="post">
      <input type="hidden" name="accion" value="vaciar">
      <p><input type="submit" value="Vaciar carrito"></p>
    </form>
  <?php } ?>
</body>
</html>