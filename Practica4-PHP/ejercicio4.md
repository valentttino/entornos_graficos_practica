# Práctica N°4 | Variables, tipos, operadores, expresiones, estructuras de control | Ejercicio 4

`datos.php`:

```php
<?php
$color = 'blanco';
$flor = 'clavel';
?>
```

Script principal:

```php
<?php
echo "El $flor $color \n";
include 'datos.php';
echo " El $flor $color";
?>
```

## Salidas

| Instrucción | Qué ocurre | Salida |
|-------------|------------|--------|
| `echo "El $flor $color \n";` | **Todavía no se incluyó `datos.php`**, por lo que `$flor` y `$color` no existen. PHP los trata como vacíos y emite un aviso (*Warning: Undefined variable* en PHP 8, *Notice* en PHP 7) | `El` + espacios + salto de línea (`El   \n`), sin los nombres |
| `include 'datos.php';` | Ejecuta el archivo en este punto: define `$color = 'blanco'` y `$flor = 'clavel'` en el mismo ámbito | (sin salida) |
| `echo " El $flor $color";` | Ahora las variables existen | ` El clavel blanco` |

**Salida visible en el navegador:**

```
El  El clavel blanco
```

Justificación:

- `include` incorpora y ejecuta el código del archivo **en el lugar donde se invoca**. Las variables que define quedan disponibles desde ese punto en adelante, no antes.
- Por eso el primer `echo`, que está antes del `include`, no muestra `clavel` ni `blanco`, y el segundo sí.
- El `\n` del primer `echo` no se ve en el navegador (el HTML ignora los saltos de línea); sí se vería en la consola o con "ver código fuente".
- Si el servidor muestra errores (`display_errors`), antes del texto aparecerán los avisos de variable indefinida.