# Práctica N°2 – CSS · Ejercicio 1

## 1. ¿Qué es CSS y para qué se usa?

**CSS** (*Cascading Style Sheets*, hojas de estilo en cascada) es un lenguaje, estandarizado por el W3C, que describe **cómo se presenta** un documento HTML/XML: colores, fuentes, tamaños, márgenes, posición de los elementos, etc.

Se usa para **separar el contenido (HTML) de la presentación (CSS)**. Esto permite cambiar el aspecto de todo un sitio editando un solo archivo, reutilizar estilos, mantener el código más limpio y adaptar la misma página a distintos dispositivos.

## 2. Reglas y declaraciones de estilo: ¿cómo funcionan?

Una **regla** tiene dos partes: el **selector** (a qué elementos se aplica) y el **bloque de declaraciones** entre llaves. Cada **declaración** es un par `propiedad: valor;`.

```css
selector {
    propiedad: valor;     /* declaración */
    propiedad2: valor2;   /* declaración */
}

p {
    color: red;
    font-size: 12px;
}
```

El navegador busca todos los elementos que coinciden con el selector y les aplica las declaraciones. Se pueden agrupar selectores con comas (`h1, h2 { color: blue; }`).

## 3. Las tres formas de dar estilo a un documento

| Forma | Dónde se escribe | Ejemplo |
|-------|------------------|---------|
| **En línea** (*inline*) | En el atributo `style` del elemento. Afecta solo a ese elemento. | `<p style="color:red;">Hola</p>` |
| **Interna** (*embebida*) | En un bloque `<style>` dentro del `<head>`. Afecta a esa página. | `<style> p { color: red; } </style>` |
| **Externa** | En un archivo `.css` aparte, vinculado con `<link>` (o `@import`). Afecta a todas las páginas que lo vinculen. | `<link rel="stylesheet" type="text/css" href="estilo.css">` |

La externa es la más recomendable porque reutiliza los estilos en todo el sitio.

## 4. Tipos de selectores más utilizados

| Selector | Qué selecciona | Ejemplo |
|----------|----------------|---------|
| **De tipo (elemento)** | Todas las etiquetas de ese tipo | `p { color: blue; }` |
| **Universal** | Todos los elementos | `* { margin: 0; }` |
| **De clase** | Elementos con ese `class` (reutilizable) | `.aviso { color: red; }` → `<p class="aviso">` |
| **De id** | El elemento con ese `id` (único en la página) | `#encabezado { background: #ccc; }` → `<div id="encabezado">` |
| **Agrupación** | Varios selectores a la vez | `h1, h2, h3 { font-family: Verdana; }` |
| **Descendiente** (espacio) | Elementos dentro de otro, a cualquier nivel | `ul li { color: green; }` |
| **Hijo** (`>`) | Solo hijos directos | `ul > li { color: green; }` |
| **Adyacente** (`+`) | El elemento que sigue inmediatamente a otro | `h1 + p { font-weight: bold; }` |
| **De atributo** | Elementos que tienen cierto atributo/valor | `a[href] { color: blue; }`, `input[type="text"] { width: 200px; }` |
| **Combinados** | Tipo + clase / tipo + id | `p.aviso { ... }`, `p#normal { ... }` |
| **Pseudo-clase / pseudo-elemento** | Un estado o parte de un elemento | `a:hover { ... }`, `p:first-line { ... }` |

## 5. ¿Qué es una pseudo-clase? Las más usadas en vínculos

Una **pseudo-clase** es un selector que se aplica a un elemento **según su estado o situación** (no según un atributo del HTML). Se escribe con `:` después del selector.

Aplicadas a vínculos:

| Pseudo-clase | Cuándo se aplica |
|--------------|------------------|
| `a:link` | Enlace **aún no visitado** |
| `a:visited` | Enlace **ya visitado** |
| `a:hover` | Cuando el mouse **pasa por encima** |
| `a:active` | Mientras se **hace clic** (se está activando) |
| `a:focus` | Cuando el enlace tiene el **foco** (por ejemplo, con el teclado) |

Conviene declararlas en el orden **L**o**V**e **HA**te: `link`, `visited`, `hover`, `active`, porque si tienen igual especificidad la última gana.

Otras pseudo-clases comunes: `:first-child`, `:focus`, `:nth-child()`.

## 6. ¿Qué es la herencia?

Es el mecanismo por el cual un elemento **hereda** los valores de ciertas propiedades de su elemento **padre**. Si se define `color` o `font-family` en `body`, todos los elementos dentro de `body` los toman, salvo que se les asigne otro valor.

No todas las propiedades se heredan: por ejemplo `color`, `font-*`, `text-align` o `line-height` **sí**; `margin`, `padding`, `border`, `background` o `width` **no**.

```css
body { color: green; font-family: Arial; }
/* <p>, <li>, <td>, etc. dentro del body heredan verde y Arial */
```

## 7. ¿En qué consiste la cascada?

Es el proceso por el cual el navegador **resuelve los conflictos** cuando varias reglas intentan dar valores distintos a la misma propiedad de un elemento. Para decidir, considera, en orden:

1. **Origen e importancia:** estilos del autor frente a los del navegador y del usuario; una declaración con `!important` prevalece.
2. **Especificidad del selector:** el más específico gana (en línea > id > clase/pseudo-clase/atributo > tipo > universal).
3. **Orden de aparición:** si la especificidad es igual, **gana la última** regla declarada.

Además, un valor declarado directamente sobre un elemento siempre gana frente a uno heredado.