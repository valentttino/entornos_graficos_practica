# Práctica N°4 | Variables, tipos, operadores, expresiones, estructuras de control | Ejercicio 1

## Variables y su tipo

| Variable | Valor inicial | Tipo |
|----------|---------------|------|
| `$a` | `TRUE` | boolean |
| `$b` | `"xyz"` | string (comillas dobles: interpola variables) |
| `$c` | `'xyz'` | string (comillas simples: texto literal) |
| `$d` | `12` | integer |
| `$f` | resultado de `doble($d++)` | integer |
| `$g` | resultado de `$f += 10` | integer |
| `$i` | parámetro de `doble()` | integer (variable local de la función) |

## Operadores

| Operador | Tipo | Dónde se usa |
|----------|------|--------------|
| `=` | asignación | `$a = TRUE;`, `$d = ...`, `$f = ...`, `$g = ...` |
| `+=` | asignación compuesta (suma y asigna) | `$d += 4;`, `$f += 10` |
| `? :` | ternario (condicional) | `$a ? ++$d : $d*3` |
| `++$d` | incremento **previo** (incrementa y luego devuelve el valor) | dentro del ternario |
| `$d++` | incremento **posterior** (devuelve el valor y luego incrementa) | `doble($d++)` |
| `*` | multiplicación | `$i*2`, `$d*3` |

La coma de `echo $a, $b, ...` no es un operador: separa los argumentos de `echo`.

## Funciones y parámetros

| Función | Parámetros | Qué hace |
|---------|------------|----------|
| `doble($i)` (definida por el usuario) | `$i`: número | Devuelve `$i*2`. |
| `gettype($a)` (predefinida) | cualquier variable | Devuelve el nombre del tipo como texto. |
| `is_int($d)` (predefinida) | cualquier variable | `true` si es entero. |
| `is_string($a)` (predefinida) | cualquier variable | `true` si es string. |

`echo` es una construcción del lenguaje (no una función) que imprime uno o más valores.

## Estructuras de control

- `if (is_int($d)) { ... }`: condicional simple, sin `else`.
- `if (is_string($a)) { ... }`: condicional simple, sin `else`.
- `$a ? ++$d : $d*3`: operador ternario (condicional en una expresión).
- No hay bucles.

## Ejecución paso a paso

| Instrucción | Resultado |
|-------------|-----------|
| `echo gettype($a)` ... `gettype($d)` | Imprime `boolean`, `string`, `string`, `integer` |
| `is_int($d)` → `true` | `$d` pasa de 12 a **16** |
| `is_string($a)` → `false` (`$a` es booleano) | No imprime nada |
| `$d = $a ? ++$d : $d*3` | `$a` es verdadero, entonces `++$d` → **`$d` = 17** |
| `$f = doble($d++)` | Se pasa 17 (incremento posterior) y después `$d` pasa a **18**; `doble(17)` = 34 → **`$f` = 34** |
| `$g = $f += 10` | Primero `$f` = 44 y luego `$g` = **44** |
| `echo $a, $b, $c, $d, $f, $g` | `$a` verdadero se imprime como `1`; después `xyz`, `xyz`, `18`, `44`, `44` |

## Salida por pantalla

```
booleanstringstringinteger1xyzxyz184444
```
