# Práctica N°4 | Arrays, funciones | Ejercicio 4

## Análisis de la función

```php
function comprobar_nombre_usuario($nombre_usuario) {
    // compruebo que el tamaño del string sea válido.
    if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20) {
        echo $nombre_usuario . " no es válido<br>";
        return false;
    }

    // compruebo que los caracteres sean los permitidos
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    for ($i = 0; $i < strlen($nombre_usuario); $i++) {
        if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false) {
            echo $nombre_usuario . " no es válido<br>";
            return false;
        }
    }
    echo $nombre_usuario . " es válido<br>";
    return true;
}
```

**Qué hace:** valida un nombre de usuario. Es válido si cumple **las dos** condiciones:

1. **Longitud:** entre 3 y 20 caracteres (`strlen`). Si es más corto o más largo, informa que no es válido y devuelve `false`.
2. **Caracteres permitidos:** solo letras sin tildes (mayúsculas y minúsculas), dígitos, guion `-` y guion bajo `_`. Recorre el texto carácter por carácter (`substr($nombre_usuario, $i, 1)`) y busca cada uno en `$permitidos` con `strpos`. Si alguno no está, informa que no es válido y devuelve `false`.

Si pasa ambas pruebas, imprime "es válido" y devuelve `true`.

Puntos a destacar:

- Se usa `=== false` (comparación estricta) porque `strpos` devuelve la **posición**, y la posición `0` (por ejemplo, la letra `a`) es "falsa" con `==`. Con `===` solo se detecta el caso "no encontrado".
- La función **imprime y devuelve** un booleano: sirve tanto para mostrar el mensaje como para usarla en un `if`.
- `strlen` cuenta **bytes**, por lo que un carácter como `ñ` (2 bytes en UTF-8) cuenta doble; de todos modos no está permitido.

## Script de prueba

```php
<?php
function comprobar_nombre_usuario($nombre_usuario) {
    if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20) {
        echo $nombre_usuario . " no es válido<br>";
        return false;
    }
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    for ($i = 0; $i < strlen($nombre_usuario); $i++) {
        if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false) {
            echo $nombre_usuario . " no es válido<br>";
            return false;
        }
    }
    echo $nombre_usuario . " es válido<br>";
    return true;
}

$pruebas = array(
    "ab",                      // muy corto
    "usuario_1",               // válido
    "Juan-Perez",              // válido (guion permitido)
    "juan perez",              // espacio no permitido
    "ñandú",                   // caracteres con tilde/ñ
    "abcdefghijklmnopqrst",    // 20 caracteres: válido
    "abcdefghijklmnopqrstu",   // 21 caracteres: demasiado largo
    ""                         // vacío
);

foreach ($pruebas as $nombre) {
    $resultado = comprobar_nombre_usuario($nombre);
    echo "Resultado devuelto: " . ($resultado ? "true" : "false") . "<br><br>";
}
?>
```

## Resultado esperado

| Nombre probado | Resultado | Motivo |
|----------------|-----------|--------|
| `ab` | no es válido | 2 caracteres (mínimo 3) |
| `usuario_1` | es válido | letras, `_` y número |
| `Juan-Perez` | es válido | el guion está permitido |
| `juan perez` | no es válido | el espacio no está permitido |
| `ñandú` | no es válido | `ñ` y `ú` no están permitidos |
| `abcdefghijklmnopqrst` | es válido | exactamente 20 caracteres |
| `abcdefghijklmnopqrstu` | no es válido | 21 caracteres (máximo 20) |
| *(vacío)* | no es válido | 0 caracteres |