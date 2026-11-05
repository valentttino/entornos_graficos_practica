<?php
/* Ejercicio 7 - Catálogo del carrito de compras */
session_start();
require 'conexion.php';

$cantidadEnCarrito = isset($_SESSION['carrito']) ? array_sum($_SESSION['carrito']) : 0;

$vResultado = mysqli_query($link, "SELECT id, producto, precio FROM catalogo ORDER BY id")
    or die("Error en la consulta: " . mysqli_error($link));
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Ejercicio 7 - Catálogo</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    table { border-collapse: collapse; }
    th, td { border: 1px solid #999; padding: 4px 12px; }
    th { background: #ddd; }
    td.num { text-align: right; }
  </style>
</head>
<body>
  <h1>Catálogo de productos</h1>
  <p><a href="carrito.php">Ver carrito (<?php echo (int)$cantidadEnCarrito; ?> productos)</a></p>

  <table>
    <tr><th>Producto</th><th>Precio</th><th></th></tr>
    <?php while ($fila = mysqli_fetch_array($vResultado)) { ?>
      <tr>
        <td><?php echo h($fila['producto']); ?></td>
        <td class="num">$ <?php echo number_format((float)$fila['precio'], 2, ',', '.'); ?></td>
        <td>
          <form action="carrito.php" method="post">
            <input type="hidden" name="accion" value="agregar">
            <input type="hidden" name="id" value="<?php echo (int)$fila['id']; ?>">
            <input type="submit" value="Agregar al carrito">
          </form>
        </td>
      </tr>
    <?php } ?>
  </table>
</body>
</html>
<?php
mysqli_free_result($vResultado);
mysqli_close($link);
?>