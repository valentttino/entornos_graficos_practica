# Práctica N°2 – CSS · Ejercicio 4

## Caso 1: la clase está en el párrafo

```html
<body>
<p class="contenido" style="font-weight: normal;"> Este es un texto ...</p>
<table>... <td>Y esta es una tabla.......</td> ... <td><a href="http://www.google.com.ar">con un enlace</a></td> ...</table>
</body>
```

### Párrafo

| Propiedad | Valor final | Por qué |
|-----------|-------------|---------|
| `font-family` | Arial, Helvetica | Regla `p` |
| `font-size` | **14px** | `.contenido` (clase) gana a `p` (tipo), que decía 10px |
| `font-weight` | **normal** | El `style` en línea gana a `.contenido` (bold) |
| `color` | **negro** | `p` (tipo) gana a `*` (universal) |

### Tabla y celdas

- El texto de la tabla ("Y esta es una tabla") es **verde** (por la regla `*`), con fuente y tamaño por defecto, sin negrita. La clase `contenido` no la afecta porque está solo en el `<p>`.

### Enlace

- Se ve **gris** si no fue visitado (`a:link`), **azul** si ya se visitó, **fucsia** al pasar el mouse y **rojo** mientras se hace clic. Tamaño y fuente por defecto, sin negrita.

## Caso 2: la clase está en el `<body>`

```html
<body class="contenido">
<p> Este es un texto................</p>
<table>... <td>Y esta es una tabla.......</td> ... <td><a href="http://www.google.com.ar">con un enlace</a></td> ...</table>
</body>
```

El `body` recibe `font-size: 14px` y `font-weight: bold`, y sus descendientes **heredan** esas dos propiedades (el color no, porque `*` lo fija en verde en cada elemento).

### Párrafo

| Propiedad | Valor final | Por qué |
|-----------|-------------|---------|
| `font-family` | Arial, Helvetica | Regla `p` |
| `font-size` | **10px** | La regla `p` aplica directo al párrafo y gana a lo heredado (14px) |
| `font-weight` | **bold** | Se hereda del `body`; `p` no define peso |
| `color` | **negro** | Regla `p` |

### Tabla y celdas

- Texto **verde** (`*`), **14px** y **negrita** heredados del `body`.

### Enlace

- Mismos colores por estado que en el caso 1 (gris, azul, fucsia, rojo), pero ahora en **14px y negrita** heredados a través de la celda.

> En navegadores en *modo quirks* (sin `DOCTYPE`) las tablas pueden no heredar el tamaño de fuente. Con un `DOCTYPE` correcto (modo estándar) el comportamiento es el descrito.

## Comparación

| | Caso 1 (clase en `<p>`) | Caso 2 (clase en `<body>`) |
|---|-------------------------|----------------------------|
| **Párrafo: tamaño** | 14px | 10px |
| **Párrafo: peso** | normal (por el `style` en línea) | negrita (heredada) |
| **Tabla / texto de celdas** | Tamaño por defecto, sin negrita | 14px y negrita |
| **Enlace** | Tamaño por defecto, sin negrita | 14px y negrita |
| **Colores** | Igual en ambos: párrafo negro, resto verde, enlaces según estado | |

**Idea clave:** una clase en el `<p>` afecta solo a ese párrafo (y un estilo en línea puede anularla), mientras que en el `<body>` actúa por **herencia** sobre todo el documento, pero cualquier regla que apunte directamente a un elemento (como `p`) le gana a lo heredado.