# Ejercicio 2

HTML está compuesto por un conjunto de elementos que son la base de su estructura. Los elementos están compuestos por dos tags (el de apertura y el de cierre) y el contenido en el medio (con excepción de los elementos vacíos). Cada tag puede tener atributos (proporcionan ciertas características como altura, ancho, color, etc.) y eventos (asocian un script que se ejecuta cuando el evento ocurre).

## 2.a
```html
<!-- Código controlado el día 12/08/2009 →
```

* **Sección del documento:** Se puede colocar en **cualquier sección** del documento (`<head>`, `<body>` o fuera de ellos).
* **Efecto que produce:** Inserta una **nota o comentario interno** para los desarrolladores. Es ignorado por el navegador y no se muestra en la pantalla.
* **Elementos y Etiquetas:**
  * **Comentario HTML:** Abre con `<!--` y cierra con `-->`.
* **Atributos:** **No posee.** Los comentarios no aceptan atributos.

---

## 2.b
```html
<div id="bloque1">Contenido del bloque1</div>
```

* **Sección del documento:** Se coloca dentro de la sección **`<body>`**.
* **Efecto que produce:** Crea un contenedor genérico en bloque que agrupa el texto `"Contenido del bloque1"`, útil para aplicar estilos CSS o manipularlo mediante Js.
* **Elementos y Etiquetas:**
  * **Elemento:** `<div>`
  * **Etiqueta de apertura:** `<div>` (Obligatoria).
  * **Etiqueta de cierre:** `</div>` (Obligatoria).
  * **Contenido:** `"Contenido del bloque1"`
* **Atributos:**
  * **`id="bloque1"`**
    * **Nombre:** `id`
    * **Valor:** `"bloque1"`
    * **Obligatoriedad:** **Opcional.** Se utiliza para identificar de forma única al elemento dentro del DOM.

---

## 2.c
```html
<img src="" alt="lugar imagen" id="im1" name="im1" width="32" height="32" longdesc="detalles.htm" />
```

* **Sección del documento:** Se coloca dentro de la sección **`<body>`**.
* **Efecto que produce:** Intenta incrustar una imagen en la página. Dado que el atributo `src` está vacío (`""`), el navegador no muestra ninguna imagen, sino que el texto alternativo `"lugar imagen"`.
* **Elementos y Etiquetas:**
  * **Elemento:** `<img>` (Elemento vacío / autocontenido).
  * **Etiqueta de apertura/cierre:** `<img ... />` (En HTML no tiene etiqueta de cierre separada; la barra `/` final es opcional en HTML5).
* **Atributos:**
  * **`src=""`**
    * **Nombre:** `src` | **Valor:** `""` (cadena vacía)
    * **Obligatoriedad:** **Obligatorio** en términos prácticos (requerido por la especificación para indicar la ruta del archivo de imagen).
  * **`alt="lugar imagen"`**
    * **Nombre:** `alt` | **Valor:** `"lugar imagen"`
    * **Obligatoriedad:** **Obligatorio** según las normas del W3C (accesibilidad para lectores de pantalla y fallo de carga).
  * **`id="im1"`**
    * **Nombre:** `id` | **Valor:** `"im1"`
    * **Obligatoriedad:** **Opcional** (identificador único).
  * **`name="im1"`**
    * **Nombre:** `name` | **Valor:** `"im1"`
    * **Obligatoriedad:** **Opcional / Obsoleto** en `<img>` para HTML5 (se debe usar `id`).
  * **`width="32"`**
    * **Nombre:** `width` | **Valor:** `"32"`
    * **Obligatoriedad:** **Opcional** (define el ancho en píxeles).
  * **`height="32"`**
    * **Nombre:** `height` | **Valor:** `"32"`
    * **Obligatoriedad:** **Opcional** (define la altura en píxeles).
  * **`longdesc="detalles.htm"`**
    * **Nombre:** `longdesc` | **Valor:** `"detalles.htm"`
    * **Obligatoriedad:** **Opcional / Obsoleto** (servía para enlazar a una descripción larga de la imagen).

---

## 2.d
```html
<meta name="keywords" lang="es" content="casa, compra, venta, alquiler " />
<meta http-equiv="expires" content="16-Sep-2019 7:49 PM" />
```

* **Sección del documento:** Se coloca dentro de la sección **`<head>`**.
* **Efecto que produce:** Proporciona metadatos sobre el documento:
  1. Define las palabras clave del sitio en idioma español para motores de búsqueda.
  2. Indica la fecha de expiración del contenido para gestionar la memoria caché del navegador.
* **Elementos y Etiquetas:**
  * **Elementos:** Dos etiquetas de metadatos `<meta>` (Elementos vacíos).
  * **Etiqueta:** `<meta ... />`
* **Atributos:**
  * **Primer `<meta>`:**
    * **`name="keywords"`** → **Nombre:** `name` | **Valor:** `"keywords"` (Obligatorio si se define metadato genérico).
    * **`lang="es"`** → **Nombre:** `lang` | **Valor:** `"es"` (Opcional, indica el idioma del contenido del metadato).
    * **`content="casa, compra, venta, alquiler "`** → **Nombre:** `content` | **Valor:** `"casa, compra, venta, alquiler "` (Obligatorio si se usa `name`).
  * **Segundo `<meta>`:**
    * **`http-equiv="expires"`** → **Nombre:** `http-equiv` | **Valor:** `"expires"` (Obligatorio para simular cabeceras HTTP).
    * **`content="16-Sep-2019 7:49 PM"`** → **Nombre:** `content` | **Valor:** `"16-Sep-2019 7:49 PM"` (Obligatorio si se usa `http-equiv`).

---

## 2.e
```html
<a href="http://www.e-style.com.ar/resumen.html" type="text/html" hreflang="es" charset="utf-8" rel="help">Resumen HTML </a>
```

* **Sección del documento:** Se coloca dentro de la sección **`<body>`**.
* **Efecto que produce:** Crea un hipervínculo con el texto clickeable `"Resumen HTML "` que redirige al usuario a la URL especificada.
* **Elementos y Etiquetas:**
  * **Elemento:** `<a>` (Enlace / Ancla).
  * **Etiqueta de apertura:** `<a>` (Obligatoria).
  * **Etiqueta de cierre:** `</a>` (Obligatoria).
  * **Contenido:** `"Resumen HTML "`
* **Atributos:**
  * **`href="http://www.e-style.com.ar/resumen.html"`**
    * **Nombre:** `href` | **Valor:** `"http://www.e-style.com.ar/resumen.html"`
    * **Obligatoriedad:** **Prácticamente obligatorio** (si no está presente, la etiqueta no actúa como un enlace ejecutable).
  * **`type="text/html"`**
    * **Nombre:** `type` | **Valor:** `"text/html"`
    * **Obligatoriedad:** **Opcional** (especifica el tipo MIME del recurso enlazado).
  * **`hreflang="es"`**
    * **Nombre:** `hreflang` | **Valor:** `"es"`
    * **Obligatoriedad:** **Opcional** (indica el idioma del documento destino).
  * **`charset="utf-8"`**
    * **Nombre:** `charset` | **Valor:** `"utf-8"`
    * **Obligatoriedad:** **Opcional / Obsoleto** en `<a>` para HTML5.
  * **`rel="help"`**
    * **Nombre:** `rel` | **Valor:** `"help"`
    * **Obligatoriedad:** **Opcional** (indica la relación entre el documento actual y el destino, en este caso, que es una ayuda).


## 2.f
```html
<table width="200" summary="Datos correspondientes al ejercicio vencido">
<caption align="top"> Título </caption>
<tr>
<th scope="col">&nbsp;</th>
<th scope="col">A</th>
<th scope="col">B</th>
<th scope="col">C</th>
</tr>
<tr>
<th scope="row">1º</th>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
<tr>
<th scope="row">2º</th>
<td>&nbsp;</td>
<td>&nbsp;</td>
<td>&nbsp;</td>
</tr>
</table>
```

* **Sección del documento:** Se coloca dentro de la sección **`<body>`**.
* **Efecto que produce:** Construye una **tabla de datos de 3 filas y 4 columnas** con un título superior (`<caption>`), encabezados de fila y columna (`<th>`), y celdas de datos vacías (`<td>`) rellenadas con espacios no separables (`&nbsp;`).
* **Elementos y Etiquetas:**
  * **`<table>`:** Elemento principal que define la tabla. Requiere `<table>` y `</table>`.
  * **`<caption>`:** Define el título o epígrafe de la tabla. Requiere `<caption>` y `</caption>`.
  * **`<tr>`:** Define una fila de la tabla. Requiere `<tr>` y `</tr>`.
  * **`<th>`:** Define una celda de encabezado. Requiere `<th>` y `</th>`.
  * **`<td>`:** Define una celda de datos estándar. Requiere `<td>` y `</td>`.
  * **Entidad `&nbsp;`:** Espacio no separable utilizado para evitar que la celda quede completamente vacía.
* **Atributos:**
  * En `<table>`:
    * **`width="200"`** → **Nombre:** `width` | **Valor:** `"200"` | **Obligatoriedad:** **Opcional / Obsoleto en HTML5** (el ancho debe manejarse con CSS).
    * **`summary="Datos correspondientes al ejercicio vencido"`** → **Nombre:** `summary` | **Valor:** `"Datos..."` | **Obligatoriedad:** **Opcional / Obsoleto en HTML5** (resumen para lectores de pantalla).
  * En `<caption>`:
    * **`align="top"`** → **Nombre:** `align` | **Valor:** `"top"` | **Obligatoriedad:** **Opcional / Obsoleto en HTML5** (la alineación debe realizarse con CSS).
  * En `<th>`:
    * **`scope="col"`** → **Nombre:** `scope` | **Valor:** `"col"` | **Obligatoriedad:** **Opcional** (mejora la accesibilidad indicando que la celda de encabezado aplica a toda la columna).
    * **`scope="row"`** → **Nombre:** `scope` | **Valor:** `"row"` | **Obligatoriedad:** **Opcional** (mejora la accesibilidad indicando que la celda de encabezado aplica a toda la fila).

