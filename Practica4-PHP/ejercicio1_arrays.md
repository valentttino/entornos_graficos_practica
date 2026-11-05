# Práctica N°4 | Arrays, funciones | Ejercicio 1

**¿Son equivalentes los siguientes códigos?**

```php
<?php
$a = array( 'color'  => 'rojo',
            'sabor'  => 'dulce',
            'forma'  => 'redonda',
            'nombre' => 'manzana',
            4
          );
?>
```

```php
<?php
$a['color']  = 'rojo';
$a['sabor']  = 'dulce';
$a['forma']  = 'redonda';
$a['nombre'] = 'manzana';
$a[]         = 4;
?>
```

**Sí, son equivalentes.** Ambos dejan el mismo arreglo:

| Clave | Valor |
|-------|-------|
| `'color'` | `'rojo'` |
| `'sabor'` | `'dulce'` |
| `'forma'` | `'redonda'` |
| `'nombre'` | `'manzana'` |
| `0` | `4` |

Justificación:

- El primer código crea el arreglo de una vez con `array()`; el segundo lo va armando elemento por elemento (PHP crea `$a` automáticamente en la primera asignación).
- Al valor `4` no se le indica clave en ninguno de los dos. PHP le asigna el **siguiente índice entero disponible**: como no hay otras claves enteras, ese índice es **0**.
- `$a[] = 4;` es la forma de "agregar al final" con índice automático, igual que un valor sin clave dentro de `array()`.