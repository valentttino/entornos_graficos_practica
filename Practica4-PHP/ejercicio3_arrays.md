# Práctica N°4 | Arrays, funciones | Ejercicio 3

## a)

```php
<?php
$fun = getdate();
echo "Has entrado en esta pagina a las $fun[hours] horas, con $fun[minutes] minutos y $fun[seconds]
segundos, del $fun[mday]/$fun[mon]/$fun[year]";
?>
```

`getdate()` devuelve un **arreglo asociativo** con la fecha y hora actuales del servidor (claves `seconds`, `minutes`, `hours`, `mday`, `mon`, `year`, `wday`, `yday`, `weekday`, `month` y `0`).

El `echo` usa comillas dobles, por lo que cada `$fun[clave]` se reemplaza por su valor. La salida depende del momento en que se ejecute; por ejemplo, el 5 de noviembre de 2026 a las 09:07:42:

```
Has entrado en esta pagina a las 15 horas, con 7 minutos y 42 segundos, del 4/11/2026
```

Observaciones: los valores no se completan con ceros (`7` y no `07`), y el salto de línea del código dentro del texto no se nota en el navegador. La hora es la del servidor (zona horaria configurada en PHP).

## b)

```php
<?php
function sumar($sumando1, $sumando2) {
    $suma = $sumando1 + $sumando2;
    echo $sumando1 . "+" . $sumando2 . "=" . $suma;
}
sumar(5, 6);
?>
```

**Salida:**

```
5+6=11
```

La función `sumar()` recibe dos parámetros, calcula la suma y la imprime concatenando (con el operador `.`) los sumandos, los símbolos `+` e `=` y el resultado. Al llamarla con `sumar(5, 6)` imprime `5+6=11`. Nota: no usa `return`, así que **muestra** el resultado en lugar de devolverlo.