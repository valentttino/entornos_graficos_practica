# Práctica N°2 – CSS · Ejercicio 2

### Regla 1: `p#normal`

- **Selector:** de tipo + id. Selecciona solo los `<p>` cuyo `id` es `normal`.
- **Declaraciones:**
  - `font-family: arial, helvetica;` → fuente Arial (o Helvetica si no está disponible).
  - `font-size: 11px;` → tamaño 11 píxeles.
  - `font-weight: bold;` → negrita.
- **Se aplica a:** `<p id="normal">Este es un párrafo</p>`.
- **Efecto:** el primer párrafo se ve en Arial, 11px y negrita.

### Regla 2: `*#destacado`

- **Selector:** universal (`*`) + id. Selecciona **cualquier elemento** (sea `p`, `table`, etc.) con `id="destacado"`. Es equivalente a escribir solo `#destacado`.
- **Declaraciones:**
  - `border-style: solid;` → borde de línea continua.
  - `border-color: blue;` → borde azul.
  - `border-width: 2px;` → grosor de 2 píxeles.
- **Se aplica a:** `<p id="destacado">` y `<table id="destacado">`.
- **Efecto:** tanto el segundo párrafo como la tabla se muestran con un borde azul sólido de 2px. El párrafo lo muestra alrededor de todo su ancho, y la tabla alrededor de la tabla.
- **Observación:** un `id` debe ser **único** en el documento. Acá está repetido en dos elementos, lo que es incorrecto en HTML aunque los navegadores igual aplican la regla a ambos. Lo correcto sería usar una **clase** (`.destacado`).

### Regla 3: `#distinto`

- **Selector:** de id. Selecciona el elemento con `id="distinto"`.
- **Declaraciones:**
  - `background-color: #9EC7EB;` → fondo celeste.
  - `color: red;` → texto rojo.
- **Se aplica a:** `<p id="distinto">Este es el último párrafo</p>`.
- **Efecto:** el último párrafo se ve con texto rojo sobre fondo celeste.
