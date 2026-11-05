# Práctica N°6 | Manejo de bases de datos con PHP | Ejercicio 1

## Completar

> Consulta a una base de datos: para comenzar la comunicación con un servidor de base de datos MySQL, es necesario abrir una conexión a ese servidor. Para inicializar esta conexión, PHP ofrece la función…

**`mysqli_connect()`** (equivale a crear un objeto `new mysqli(...)`). Devuelve un identificador de conexión (por ejemplo `$link`) o `false` si falla.

> Todos sus parámetros son opcionales, pero hay tres de ellos que generalmente son necesarios:

- **El servidor** (*host*) donde está MySQL, por ejemplo `"localhost"`.
- **El nombre de usuario** de MySQL.
- **La contraseña** de ese usuario.

(La función admite además, como cuarto parámetro, el nombre de la base de datos, y como quinto el puerto.)

```php
$link = mysqli_connect("localhost", "usuario", "clave");
```

> Una vez abierta la conexión, se debe seleccionar una base de datos para su uso, mediante la función…

**`mysqli_select_db()`**

> Esta función debe pasar como parámetro…

- **El identificador de la conexión** (`$link`), y
- **el nombre de la base de datos** que se quiere usar.

```php
mysqli_select_db($link, "Capitales");
```

> La función `mysqli_query()` se utiliza para…

**Enviar una sentencia SQL al servidor** para que la ejecute sobre la base de datos seleccionada (`SELECT`, `INSERT`, `UPDATE`, `DELETE`, etc.).

> …y requiere como parámetros

- **El identificador de la conexión** (`$link`), y
- **la cadena con la consulta SQL** a ejecutar.

Con un `SELECT` devuelve un **conjunto de resultados** (o `false` si hay error); con `INSERT`, `UPDATE` o `DELETE` devuelve `true` o `false`.

```php
$vResultado = mysqli_query($link, "SELECT id, ciudad, pais FROM Ciudades");
```

> La cláusula `or die()` se utiliza para…

**Terminar la ejecución del script** y mostrar un mensaje cuando la instrucción anterior falla (devuelve `false`). Evita seguir trabajando con una conexión o una consulta que no funcionó.

> …y la función `mysqli_error()` se puede usar para…

**Obtener el texto del último error de MySQL** (por ejemplo, un error de sintaxis o una tabla inexistente) y mostrarlo junto al mensaje de `die()`, para saber por qué falló.

```php
$vResultado = mysqli_query($link, $sql)
    or die("Error en la consulta: " . mysqli_error($link));
```

## Explicar el código

```php
<?php
while ($fila = mysqli_fetch_array($vResultado))
{
?>
<tr>
    <td><?php echo ($fila[0]); ?></td>
    <td><?php echo ($fila[1]); ?></td>
    <td><?php echo ($fila[2']); ?></td>
</tr>
<tr>
    <td colspan="5">
<?php
}
mysqli_free_result($vResultado);

mysqli_close($link);
?>
```

**Qué hace:** recorre el resultado de la consulta y lo muestra como filas de una tabla HTML.

1. `mysqli_fetch_array($vResultado)` toma la **siguiente fila** del conjunto de resultados y la devuelve como un arreglo, al que se accede por posición (`$fila[0]`, `$fila[1]`, ...) y también por nombre de columna (`$fila['ciudad']`). Cuando ya no quedan filas devuelve `null`.
2. Esa llamada está en la condición del `while`: cada vuelta asigna la fila a `$fila` y el bucle continúa mientras haya filas.
3. Dentro del bucle se "sale" de PHP (`?>`) para escribir HTML. Por cada fila se genera un `<tr>` con tres celdas `<td>`, que muestran el contenido de las columnas 0, 1 y 2 del resultado.
4. Al terminar el bucle, `mysqli_free_result($vResultado)` **libera la memoria** que ocupaba el resultado y `mysqli_close($link)` **cierra la conexión** con el servidor.