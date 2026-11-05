# Práctica N°4 | Arrays, funciones | Ejercicio 2

## a)

```php
$matriz = array("x" => "bar", 12 => true);
echo $matriz["x"];
echo $matriz[12];
```

**Salida:** `bar1`

- `$matriz["x"]` vale `"bar"`.
- `$matriz[12]` vale `true`, y al imprimir un booleano con `echo`, `true` se convierte en `"1"` (y `false` en cadena vacía).

## b)

```php
$matriz = array("unamatriz" => array(6 => 5, 13 => 9, "a" => 42));
echo $matriz["unamatriz"][6];
echo $matriz["unamatriz"][13];
echo $matriz["unamatriz"]["a"];
```

**Salida:** `5942`

Es un arreglo **multidimensional**: la clave `"unamatriz"` contiene otro arreglo. Se accede encadenando corchetes: `[6]` → 5, `[13]` → 9 y `["a"]` → 42. Se imprime `5`, `9` y `42` sin separadores.

## c)

```php
$matriz = array(5 => 1, 12 => 2);
$matriz[] = 56;
$matriz["x"] = 42;
unset($matriz[5]);
unset($matriz);
```

**Salida:** ninguna (el código no tiene `echo` ni `print`).

Estado del arreglo paso a paso:

| Instrucción | Contenido de `$matriz` |
|-------------|------------------------|
| `array(5 => 1, 12 => 2)` | `[5 => 1, 12 => 2]` |
| `$matriz[] = 56;` | `[5 => 1, 12 => 2, 13 => 56]` (el índice automático es el mayor entero usado + 1) |
| `$matriz["x"] = 42;` | `[5 => 1, 12 => 2, 13 => 56, "x" => 42]` |
| `unset($matriz[5]);` | `[12 => 2, 13 => 56, "x" => 42]` (se elimina solo ese elemento) |
| `unset($matriz);` | La variable deja de existir; usarla después daría "variable no definida" |