# Práctica N°4 | Variables, tipos, operadores, expresiones, estructuras de control | Ejercicio 2

**¿Son equivalentes los siguientes códigos? Para decidirlo se compara la salida de cada uno.**

## a) `while`, `while` con sintaxis alternativa y `do ... while`

| Código | Cómo funciona | Salida |
|--------|---------------|--------|
| `$i = 1; while ($i <= 10) { print $i++; }` | Imprime `$i` y luego lo incrementa, mientras `$i <= 10` | `12345678910` |
| `$i = 1; while ($i <= 10): print $i; $i++; endwhile;` | Es el mismo bucle con la sintaxis alternativa (`:` y `endwhile`) | `12345678910` |
| `$i = 0; do { print ++$i; } while ($i < 10);` | Incrementa **antes** de imprimir; el bucle termina cuando `$i` llega a 10 | `12345678910` |

**Son equivalentes:** los tres imprimen los números del 1 al 10.

Observaciones:

- `print $i++` imprime y luego incrementa; `print ++$i` incrementa y luego imprime. Por eso el tercero arranca en 0.
- `do ... while` evalúa la condición **al final** y siempre se ejecuta al menos una vez. Acá coincide con los otros porque `$i` arranca en 0 y la condición es `$i < 10`.

## b) Distintas formas del `for`

| Código | Cómo funciona | Salida |
|--------|---------------|--------|
| `for ($i = 1; $i <= 10; $i++) { print $i; }` | `for` clásico | `12345678910` |
| `for ($i = 1; ; $i++) { if ($i > 10) break; print $i; }` | Sin condición en el `for` (se considera siempre verdadera); la salida se hace con `break` | `12345678910` |
| `$i = 1; for (;;) { if ($i > 10) break; print $i; $i++; }` | Bucle infinito con `for (;;)`; inicialización e incremento van afuera y adentro | `12345678910` |
| `for ($i = 1; $i <= 10; print $i, $i++) ;` | Cuerpo vacío; la tercera parte del `for` admite varias expresiones separadas por coma: primero `print $i` y después `$i++` | `12345678910` |

**Son equivalentes:** los cuatro imprimen del 1 al 10. Cambia solamente dónde se ubican la inicialización, la condición y el incremento.

## c) `if / elseif` y `switch`

```php
if ($i == 0) { print "i equals 0"; }
elseif ($i == 1) { print "i equals 1"; }
elseif ($i == 2) { print "i equals 2"; }
```

```php
switch ($i) {
    case 0: print "i equals 0"; break;
    case 1: print "i equals 1"; break;
    case 2: print "i equals 2"; break;
}
```

**Son equivalentes:** para cualquier valor de `$i` imprimen lo mismo (`i equals 0/1/2`, o nada si `$i` es otro valor).

Observaciones:

- `switch` compara con `==` (comparación flexible), igual que los `if`.
- Cada `case` termina con `break`; sin él, la ejecución "caería" al caso siguiente y dejarían de ser equivalentes.
- `switch` evalúa `$i` una sola vez y suele ser más legible cuando se compara una misma variable con muchos valores.