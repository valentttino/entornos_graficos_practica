# Práctica N°4 | Variables, tipos, operadores, expresiones, estructuras de control | Ejercicio 3

## a) Documento 1: tabla generada con bucles

```php
echo "<table width = 90% border = '1' >";
$row = 5;
$col = 2;
for ($r = 1; $r <= $row; $r++) {
    echo "<tr>";
    for ($c = 1; $c <= $col; $c++) {
        echo "<td>&nbsp;</td>\n";
    }
    echo "</tr>\n";
}
echo "</table>\n";
```

**Para qué sirve:** genera dinámicamente una **tabla HTML de 5 filas por 2 columnas** (10 celdas vacías con `&nbsp;`), con borde de 1 y un ancho del 90 % de la página.

Cómo funciona:

- `$row` y `$col` definen la cantidad de filas y de columnas.
- El `for` externo recorre las filas: por cada una imprime `<tr>`, ejecuta el `for` interno y cierra con `</tr>`.
- El `for` interno imprime una celda `<td>&nbsp;</td>` por cada columna.
- Cambiando solo `$row` y `$col` se obtiene una tabla de cualquier tamaño, sin escribir el HTML a mano. Los `\n` solo ordenan el código fuente generado; no se notan en el navegador.

## b) Documento 2: formulario que se procesa a sí mismo

```php
if (!isset($_POST['submit'])) {
    // formulario: Edad + botón "Ir"
} else {
    $age = $_POST['age'];
    if ($age >= 21) { echo 'Mayor de edad'; }
    else            { echo 'Menor de edad'; }
}
```

**Para qué sirve:** pide la edad al usuario y le informa si es **mayor o menor de edad**, en una sola página que cumple dos funciones:

1. **Primera visita:** como todavía no se envió el formulario, `$_POST['submit']` no existe (`!isset(...)` es verdadero) y se muestra el formulario. Su `action` es `$_SERVER['PHP_SELF']`, es decir, envía los datos a **la misma página**, con método `post`.
2. **Después de enviar:** `$_POST['submit']` existe (es el botón "Ir"), entonces se lee `$_POST['age']` y se compara: si es `>= 21` muestra "Mayor de edad"; si no, "Menor de edad".