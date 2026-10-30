# Práctica N°2 – CSS · Ejercicio 3

## Reglas, declaraciones y aplicación

| Regla | Selector | Declaración | Se aplica a |
|-------|----------|-------------|-------------|
| 1 | `p.quitar`: tipo + clase | `color: red;` | Solo los `<p>` con `class="quitar"` |
| 2 | `*.desarrollo`: universal + clase (equivale a `.desarrollo`) | `font-size: 8px;` | **Cualquier** elemento con `class="desarrollo"` |
| 3 | `.importante`: clase | `font-size: 20px;` | **Cualquier** elemento con `class="importante"` |

## Efecto en cada elemento

| # | Elemento | Reglas que se aplican | Resultado |
|---|----------|-----------------------|-----------|
| 1 | `<p class="desarrollo">` | Regla 2 | Texto de **8px** (muy pequeño), color por defecto. |
| 2 | `<p class="quitar">` | Regla 1 | Texto en **rojo**, tamaño normal. |
| 3 | `<p>` (sin clase) | Ninguna | Estilo por defecto del navegador. |
| 4 | `<p class="importante">` | Regla 3 | Texto de **20px** (grande), color por defecto. |
| 5 | `<h1 class="quitar">` | **Ninguna** | **No** se pone rojo: la regla 1 es `p.quitar` y solo afecta a párrafos. Se ve como un `h1` normal. |
| 6 | `<p class="quitar importante">` | Reglas 1 y 3 | **Rojo y 20px**: al tener dos clases (separadas por espacio) recibe las declaraciones de ambas reglas. |

## Conclusiones

- Una clase se puede aplicar a elementos de distinto tipo, pero si el selector incluye el tipo (`p.quitar`), solo afecta a ese tipo. Por eso el `<h1 class="quitar">` queda sin estilo.
- Un elemento puede tener **varias clases** (`class="quitar importante"`): recibe los estilos de todas. Como las dos reglas definen propiedades distintas (`color` y `font-size`), no hay conflicto.
- `*.desarrollo` y `.desarrollo` son equivalentes: el `*` es opcional cuando se usa una clase.
- **Observación sobre el HTML:** la última etiqueta del tercer bloque está escrita `</ p>` (con espacio). Eso es incorrecto y puede romper el cierre del párrafo en algunos navegadores, debe escribirse `</p>`.