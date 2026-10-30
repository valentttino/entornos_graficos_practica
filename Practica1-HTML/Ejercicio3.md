# Ejercicio 3


## 3.a

### Segmentos de código:
```html
1. <a href="http://www.google.com.ar">Click aquí para ir a Google</a>
2. <a href="http://www.google.com.ar" target="_blank">Click aquí para ir a Google</a>
3. <a href="http://www. google.com.ar" type="text/html" hreflang="es" charset="utf-8" rel="help">
4. <a href="#">Click aquí para ir a Google</a>
5. <a href="#arriba">Click aquí para volver arriba</a>
6. <a name="arriba" id="arriba"></a>
```

### Explicación de diferencias y visualización:

* **Línea 1:**
  * **Comportamiento/Visualización:** Muestra el texto *"Click aquí para ir a Google"* como un enlace estándar. Al hacer clic, abre la página de Google en la **misma pestaña/ventana** del navegador.

* **Línea 2:**
  * **Comportamiento/Visualización:** Visualmente es idéntica a la línea 1, pero debido al atributo `target="_blank"`, al hacer clic abre la página de Google en una **nueva pestaña o ventana**.

* **Línea 3:**
  * **Comportamiento/Visualización:** Presenta **errores de sintaxis**:
    1. Contiene un espacio en la URL (`http://www. google.com.ar`), lo que invalida el enlace.
    2. La etiqueta de apertura no se cierra (`>`) ni posee texto de contenido ni etiqueta de cierre `</a>`.
  * **Efecto:** No renderiza nada visible por sí misma y puede romper el HTML posterior si no se corrige.

* **Línea 4:**
  * **Comportamiento/Visualización:** Muestra el texto *"Click aquí para ir a Google"*, pero el atributo `href="#"` **no redirige a Google**. En su lugar, desplaza la página hacia la parte superior (*top*) y añade `#` a la URL actual.

* **Línea 5:**
  * **Comportamiento/Visualización:** Muestra el texto *"Click aquí para volver arriba"*. Funciona como un enlace interno o ancla (*bookmark*), desplazando la vista hacia el elemento del documento que posea el atributo `id="arriba"` o `name="arriba"`.

* **Línea 6:**
  * **Comportamiento/Visualización:** Es un **ancla de destino** (*anchor*). No tiene contenido de texto visible ni genera ninguna salida en pantalla, pero define el punto de llegada al que apunta el enlace de la línea 5 (`href="#arriba"`).


## 3.b

* **Línea 1:**
  * **Estructura:** La imagen y el enlace están separados.
  * **Visualización/Comportamiento:** Muestra la imagen (no clickeable) seguida a su derecha del texto *"Click aquí"* (clickeable). Solo hacer clic en el texto redirige a Google.

* **Línea 2:**
  * **Estructura:** La imagen está dentro del enlace `<a>`, mientras que el texto *"Click aquí"* está fuera.
  * **Visualización/Comportamiento:** Muestra la imagen seguida del texto. **Solo la imagen es clickeable** y redirige a Google; el texto *"Click aquí"* es texto plano estático.

* **Línea 3:**
  * **Estructura:** Tanto la imagen como el texto *"Click aquí"* están dentro del mismo enlace `<a>`. *(Nota: Se corrigió el salto de línea erróneo en el atributo `alt="ima gen1"` del enunciado).*
  * **Visualización/Comportamiento:** La imagen y el texto forman un **único elemento interactivo**. Hacer clic tanto en la imagen como en el texto redirige a Google.

* **Línea 4:**
  * **Estructura:** Hay dos enlaces `<a>` independientes uno al lado del otro: uno envuelve a la imagen y el otro al texto.
  * **Visualización/Comportamiento:** Visualmente produce un resultado idéntico a la línea 3 (ambos elementos llevan a Google), pero **técnicamente son dos enlaces separados**. Al navegar por teclado (tecla `Tab`), el foco seleccionará primero la imagen y luego el texto de forma independiente.

## 3.c
 
1. `<ul>`: lista **no ordenada**, con items (•) xxx, yyy, zzz.
2. `<ol>`: lista **ordenada**, numerada automáticamente 1. xxx, 2. yyy, 3. zzz.
3. Tres `<ol>` separadas: cada lista empezaría en 1, pero `value="2"` y `value="3"` fuerzan la numeración. Se ve 1, 2, 3 igual que en el caso anterior, pero son **tres listas distintas**; es una forma incorrecta de numerar.
4. `<blockquote>` con numeración escrita a mano y `<br />`: el texto se ve indentado y parece una lista numerada, pero no es una lista: los números son texto común y no hay semántica de lista.

## 3.d
 
- **Izquierda:** usa `<th>` para los títulos de columna. El navegador los muestra en **negrita y centrados** automáticamente.
- **Derecha:** usa `<td>` con `<div align="center"><strong>`. **Visualmente es casi igual**, pero se simula el formato a mano y no hay semántica de encabezado. Es la forma incorrecta.

## 3.e
 
- **Izquierda:** el título se define con `<caption>`: queda **fuera de la grilla**, centrado encima de la tabla, sin fondo. La tabla tiene 2 filas × 3 columnas grises.
- **Derecha:** el título está en una **primera fila** con `<td colspan="3">` centrado: es parte de la tabla (3 filas en total, ocupa el ancho completo y se alinea con las celdas). Las otras dos filas son iguales al caso anterior.
La diferencia es que `caption` es la forma semántica de titular una tabla; `colspan` solo lo imita visualmente.
 
## 3.f
 
Ambas tablas tienen título de ancho completo (`colspan="3"`) y fondo gris en el resto.
 
- **Izquierda:** `rowspan="2"` hace que la primera celda gris **ocupe dos filas** (columna izquierda alta), y a su derecha quedan **dos celdas apiladas** por columna (2 columnas × 2 filas).
- **Derecha:** `colspan="2"` hace que la primera celda de la fila 2 sea **ancha** (ocupa 2 columnas) y la fila 3 tiene **3 celdas** normales.
## 3.g
 
- **Izquierda:** grilla de 3 columnas: título (`colspan="3"`), una celda grande (`colspan="2" rowspan="2"`) a la izquierda y dos celdas apiladas a la derecha. Usa los espacios por defecto de la tabla (`cellspacing` y `cellpadding`), por lo que los bordes se ven **separados**.
- **Derecha:** grilla de **2 columnas**: título (`colspan="2"`), una celda alta (`rowspan="2"`) a la izquierda y dos apiladas a la derecha. Con `cellpadding="0"` y `cellspacing="0"` las celdas quedan **pegadas**, sin relleno interno.
El aspecto general es parecido (bloque a la izquierda, dos celdas a la derecha); cambia la estructura (3 vs. 2 columnas) y el espaciado.
 
## 3.h
 
| | Form 1 | Form 2 | Form 3 |
|---|--------|--------|--------|
| **action** | `procesar.php` | `""` (la misma página) | `mailto:xx@xx.com` (abre el cliente de correo) |
| **method** | `post`: datos en el cuerpo de la petición, no se ven en la URL | `get`: datos en la URL (`?usu2=...&clave2=...`) | `post` |
| **Agrupación** | `fieldset` + `legend` "LOGIN": marco con título | Solo texto "LOGIN", sin marco | `fieldset` + `legend` "LOGIN" |
| **Campos** | usuario con valor inicial "xxx"; clave `password` (puntos) con valor inicial "xxx" | `label` asocia el texto con el campo (clic en el texto da foco); la clave es `type="text"`, por lo que **se ve en pantalla** (inseguro) | usuario y clave `password`, vacíos |
| **Botón** | `submit` "Enviar": envía | `submit` "Enviar": envía | `reset` con texto "Enviar": **no envía**, borra los campos |
| **Otros** | `target="_blank"`: respuesta en nueva ventana | `target="_blank"` | `enctype="text/plain"` para que el cuerpo del correo sea legible |
 
## 3.i

- **Botón 1** (`<button>`): admite **contenido HTML adentro**; acá muestra una imagen de 30×20 y debajo el texto "CLICK AQUÍ" en **negrita**.
- **Botón 2** (`<input type="button">`): solo muestra **texto plano** (`value`), sin imágenes ni formato.
- En ambos casos, `type="button"` no envía el formulario ni hace nada por sí solo (hace falta un evento/script). El `<label>` asocia el texto "Botón 1/2" con el botón.
## 3.j
 
- **Primer bloque:** ambos tienen `name="opcion"`: forman un **grupo** y son **excluyentes** (solo se puede elegir X o Y).
- **Segundo bloque:** `name="opcion1"` y `name="opcion2"` son grupos distintos: se pueden **marcar ambos** a la vez.
- Además, si los dos bloques estuvieran en la misma página, los `id="X"` e `id="Y"` estarían repetidos (un `id` debe ser único).
## 3.k
 
- **Izquierda:** desplegable de **una sola selección**. `optgroup` agrupa las opciones bajo títulos ("Caso 1", "Caso 2") que no se pueden elegir. `name="lista"` envía un solo valor.
- **Derecha:** `multiple="multiple"` la convierte en una **caja de varias filas** con selección múltiple (Ctrl/Shift + clic). `name="lista[]"` hace que PHP reciba un **arreglo** con todas las opciones elegidas.
- En ambas, "Mayo" y "Junio" se repiten en los dos grupos; sin `value`, se envía el texto de la opción.