# Ejercicio 1

### 1. ¿Que es HTML, cuándo fue creado, cuáles fueron las distintas versiones y cuál es la última?

HTML es el lenguaje estándar utilizado para estructurar y organizar el contenido de páginas web.
No es un lenguaje de programación, sino de etiquetas.

Fue creado en 1991 por Sir Tim Berners-Lee mientras tabajab en el CERN.

Versiones:
|Version| Características  |
|--|--|
| 1.0 | La versión inicial con 18 etiquetas básicas para compartir documentos. |
| 2.0 | Primera especificación oficial; introdujo formularios y tablas básicas. |
| 3.2 | Adoptado por el W3C; añadió soporte para hojas de estilo y scripts simples. |
| 4.01 | Versión muy estable que dominó la web durante más de una década. Separó diseño (CSS) de estructura. |
| XHTML 1.0 | Reformulación de HTML 4.01 bajo las reglas estrictas del lenguaje XML. |
| HTML 5 | Revolución con soporte nativo de audio/video, etiquetas semánticas y nuevas APIs JavaScript. |

La última versión es HTML5.

---

### 2. ¿Cuáles son los principios básicos que el W3C recomienda seguir para la creación de documentos con HTML?

El Consorcio World Wide Web recomienda crear documentos HTML basándose en una serie de principios de diseño y buenas prácticas orientados a lograr una web accesible, interoperable y mantenible.

1. **Separación de contenidos y presentación.**
    - El código HTML debe dedicarse exclusivamente a la estructura.
    - El aspecto visual deben manejarse mediante CSS. Eviar uso de etiquetas o atributos obsoletos en HTML.

2. **Uso estricto de marcado semántico**
    - Utilizar la etiqueta adecuada para cada tipo de contenido en lugar de abusar de contenedores genéricos.

3. **Accesibilidad universal**
    - Siguiendo las pautas WCAG del W3C, el contenido en HTML debe ser accesible para todas las personas, incluidas aquellas con discapacidades que utilizan lectores de pantalla,

4. **Código bien formado**
    - Respetar la sintaxis del lenguaje: cerrar las etiquetas abiertas, anidarlas correctamente (una etiqueta contenedora debe cerrarse después de las etiquetas internas) y escribir los nombres de etiquetas y atributos en minúsculas.

5. **Compatibilidad e interoperabilidad**
    - Incluir siempre la declaración del tipo de documento `<!DOCTYPE html>` en la primera línea para que los navegadores rendericen la página en modo estándar y no en modo de compatibilidad (quirks mode).
    - Definir la codificación de caracteres `<meta charset="UTF-8">` para garantizar la correcta visualización de tildes y caracteres especiales.

---

### 3. En las Especificaciones de HTML, ¿cuándo un elemento o atributo se considera desaprobado? ¿y obsoleto?

En las especificaciones del W3C y del WHATWG, los términos **desaprobado** (*deprecated*) y **obsoleto** (*obsolete*) representan dos etapas distintas en el proceso de retirar una característica del lenguaje.

| Estado | Definición | ¿Los navegadores lo soportan? |
| :--- | :--- | :--- |
| **Desaprobado**<br>*(Deprecated)* | Una etiqueta o atributo **sigue siendo parte de la norma**, pero se desaconseja su uso porque existe una alternativa mejor (generalmente en CSS o con HTML semántico). Podría ser removido en el futuro. | **Sí.** Funciona correctamente en todos los navegadores modernos. |
| **Obsoleto**<br>*(Obsolete / Non-conforming)* | Una etiqueta o atributo **ha sido retirado formalmente** de la especificación vigente. Ya no se considera código HTML válido. | **Varía.** La mayoría se mantienen por compatibilidad histórica (*backwards compatibility*), pero pueden dar fallos o dejar de funcionar sin previo aviso. |

#### Causas principales de desaprobación u obsolescencia
* **Mala práctica de diseño:** Se utilizaban para dar estilos visuales dentro del HTML (violando la regla de separar estructura de presentación mediante CSS).
* **Problemas de accesibilidad:** Dificultaban o impedían la lectura del contenido por parte de lectores de pantalla.
* **Problemas de usabilidad y seguridad:** Elementos como los marcos (`<frame>`) rompían la navegación mediante el botón "Atrás", dificultaban el guardado de marcadores y creaban vulnerabilidades.

---

### 4. ¿Qué es el DTD y cuáles son los posibles DTDs contemplados en la especificación de HTML 4.01?

El **DTD** (*Document Type Definition* o Definición del Tipo de Documento) es un conjunto de reglas de sintaxis que define la estructura legal, los elementos válidos y los atributos permitidos dentro de un documento SGML o XML. Su función principal es indicar al navegador web o al validador cómo debe interpretar y procesar el código del documento.

#### Los 3 DTDs de HTML 4.01

En la especificación oficial de **HTML 4.01**, se contemplaban tres variantes de DTD según el nivel de rigurosidad y el tipo de contenido:

| DTD | Propósito y Descripción | Características clave |
| :--- | :--- | :--- |
| **HTML 4.01 Strict**<br>*(Estricto)* | Prohibía etiquetas y atributos de estilo visual (`<font>`, `<center>`, `align`, `bgcolor`), obligando al uso de CSS. Tampoco permitía marcos (`<frameset>`). | Buscaba la separación absoluta entre la estructura (HTML) y la presentación visual (CSS). |
| **HTML 4.01 Transitional**<br>*(Transicional)* | Permitía incluir etiquetas y atributos obsoletos de diseño para garantizar retrocompatibilidad. Excluía los marcos. | Pensado para sitios web antiguos en transición hacia los nuevos estándares y CSS. |
| **HTML 4.01 Frameset**<br>*(Marcos)* | Variante similar a la Transicional, pero permitía la división de la pantalla en múltiples documentos utilizando la etiqueta `<frameset>`. | Utilizado exclusivamente para sitios web estructurados en marcos navegables. |

---

#### Declaración en el código (`<!DOCTYPE>`)

Para especificar el DTD en HTML 4.01, era obligatorio incluir una declaración `<!DOCTYPE>` en la primera línea del documento:

* **Strict:**
  ```html
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "[http://www.w3.org/TR/html4/strict.dtd](http://www.w3.org/TR/html4/strict.dtd)">

* **Transitional:**
  ```html
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "[http://www.w3.org/TR/html4/loose.dtd](http://www.w3.org/TR/html4/loose.dtd)">

* **Frameset:**
  ```html
  <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "[http://www.w3.org/TR/html4/frameset.dtd](http://www.w3.org/TR/html4/frameset.dtd)">

---

### 5. ¿Qué son los metadatos y cómo se especifican en HTML?

Los **metadatos** son "datos sobre los datos": información sobre el documento HTML que no se muestra directamente en el área de contenido de la página web, pero que resulta fundamental para los navegadores, motores de búsqueda (SEO) y otros servicios web.

---

#### ¿Cómo se especifican en HTML?

Se definen dentro de la etiqueta contenedora **`<head>`** del documento, utilizando principalmente el elemento vacío **`<meta>`**, además de otras etiquetas complementarias.

##### 1. Mediante la etiqueta `<meta>` (Casos más comunes)

* **Codificación de caracteres:** Define el juego de caracteres utilizado para interpretar acentos y caracteres especiales correctamente.
  ```html
  <meta charset="UTF-8">

* **Diseño responsivo (*Viewport*):** Controla la dimensión y la escala del área visible para que la página se adapte a dispositivos móviles.
  ```html
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  ```

* **Descripción para buscadores (SEO):** Ofrece un resumen del sitio que los motores de búsqueda (como Google) muestran en sus resultados.
  ```html
  <meta name="description" content="Guía práctica con preguntas y respuestas sobre HTML y desarrollo web.">
  ```

* **Autoría y palabras clave (*Keywords*):**
  ```html
  <meta name="author" content="Nombre del Autor">
  <meta name="keywords" content="HTML, desarrollo web, tutorial, W3C">
  ```

* **Open Graph (Redes Sociales):** Permite controlar el título, la descripción y la imagen previa cuando se comparte el enlace en plataformas como WhatsApp, X o Facebook.
  ```html
  <meta property="og:title" content="Guía de HTML">
  <meta property="og:image" content="https://ejemplo.com/imagen-previa.jpg">
  ```

##### 2. Otras etiquetas de metadatos dentro de `<head>`

* **`<title>`:** Define el título oficial del documento (se muestra en la pestaña del navegador).
* **`<link>`:** Establece relaciones con recursos externos, como la hoja de estilos CSS (`rel="stylesheet"`) o el ícono de la pestaña (`rel="icon"`).
* **`<script>` y `<style>`:** Incluyen lógica de programación (JavaScript) o reglas de estilo visuales directas.

