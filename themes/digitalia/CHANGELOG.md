# Registro de Cambios (Changelog)

## 2025-02-27

### Mejoras en la visualización de episodios en series

- **11:47** - Se ha modificado el archivo `single-series.php` para ordenar los episodios con los más antiguos arriba y los más recientes abajo, aplicando `orderby='date'` y `order='ASC'` en todas las consultas de episodios.

### Mejoras en la sección "Qué es Digitalia"

- **01:17** - Se ha modificado el campo ACF `qd_commitment` para permitir tanto imágenes como videos en la sección de compromiso.
- **01:17** - Se ha actualizado la plantilla `que-es-digitalia.php` para mostrar videos o imágenes según la selección del usuario.
- **01:17** - Se agregó soporte para videos subidos directamente, así como videos incrustados de YouTube y Vimeo mediante URL.
- **01:25** - Se ajustó la altura máxima de los videos a 350px para una mejor visualización, eliminando la restricción anterior de `max-h-36`.
