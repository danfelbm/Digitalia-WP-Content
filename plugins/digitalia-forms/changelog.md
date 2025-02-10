# Changelog

## [No Publicado]

### 2025-02-09 16:19
#### Modificado
- Actualizado sistema de activación:
  - Registro de Custom Post Type durante la activación
  - Nuevas capacidades para gestión de entradas
  - Limpieza de reglas de reescritura

### 2025-02-09 16:17
#### Modificado
- API REST actualizada para usar WP_Query:
  - Endpoints de entradas adaptados al nuevo sistema de Custom Post Type
  - Soporte mejorado para paginación y ordenamiento
  - Eliminado endpoint de creación de entradas (ahora se maneja vía formulario)
  - Optimización de consultas usando meta_query

### 2025-02-09 16:14
#### Añadido
- Nuevo sistema de gestión de entradas basado en Custom Post Type:
  - Clase PostTypes/FormEntry.php para gestionar el CPT
  - Soporte para metaboxes y columnas personalizadas
  - Integración con permisos de WordPress
  - Vista mejorada de entradas en el panel de administración

- Sistema de migración de datos:
  - Clase Core/Migration.php para migrar entradas existentes
  - Migración automática de entradas a posts
  - Limpieza de tablas antiguas después de la migración

### 2025-02-09 16:11
#### Añadido
- Registro de Custom Post Type 'digitalia_form_entry'
- Capacidades específicas para el nuevo CPT

### 2025-02-09 16:11
#### Eliminado
- Eliminadas tablas y código relacionado con entradas:
  - Tabla digitalia_forms_entries
  - Tabla digitalia_forms_entry_meta
  - Tabla digitalia_forms_actions
  - Código de gestión de entradas en Database/Manager.php
  - Vista de lista de entradas (entries-list.php)
  - Exportación CSV

### 2025-02-09 15:56
#### Corregido
- Página de entradas:
  - Corregida la URL de redirección para usar la estructura de menú padre correcta
  - Añadido parámetro 'view' para mantener consistencia con la navegación

### 2025-02-09 15:54
#### Corregido
- Página de entradas:
  - Corregido el problema de página en blanco al eliminar entradas
  - Añadida verificación de contexto de página admin
  - Mejorado el manejo de redirección

### 2025-02-09 15:48
#### Corregido
- Eliminación de entradas:
  - Corregida la URL de redirección para usar la página registrada correcta (digitalia-forms-entries)

### 2025-02-09 15:47
#### Corregido
- Eliminación de entradas:
  - Corregida la URL de redirección para mostrar correctamente la página de entradas

### 2025-02-09 15:44
#### Corregido
- Eliminación de entradas:
  - Corregido el nombre del campo en los checkboxes de selección
  - Añadido refresco automático de la página tras eliminar
  - Mejorado el manejo de mensajes de éxito

### 2025-02-09 15:43
#### Corregido
- Eliminación de entradas:
  - Corregido el problema de eliminación de entradas que no funcionaba
  - Añadida eliminación de metadatos de entradas
  - Mejorado el sistema de logging para depuración

### 2025-02-09 15:32
#### Corregido
- Manejo de IDs de campos:
  - Corregido el problema de IDs cambiantes al actualizar campos
  - Preservación de IDs existentes al editar formularios
  - Mejorado el sistema de actualización de campos

### 2025-02-09 15:30
#### Corregido
- Manejo de campos históricos:
  - Corregido el problema con campos que cambiaron de ID
  - Mejorado el sistema para mantener datos históricos
  - Actualizada la visualización para usar nombres de campo en lugar de IDs

### 2025-02-09 15:28
#### Mejorado
- Sistema de depuración:
  - Añadido registro detallado para el proceso de envío de formularios
  - Mejorado el seguimiento de valores de campos y su almacenamiento
  - Añadida validación más estricta de IDs de campos

### 2025-02-09 15:22
#### Corregido
- Manejo de campos en formularios:
  - Corregida la inconsistencia entre nombres de campos en el formulario y la base de datos
  - Mejorada la validación y el guardado de valores de campos
  - Optimizado el proceso de almacenamiento de datos

### 2025-02-08 12:36
#### Corregido
- Manejo de nonce:
  - Eliminado nonce de WordPress del formulario
  - Usando nonce AJAX para la validación
  - Corregido error 403 en envío de formulario

### 2025-02-08 12:34
#### Corregido
- Manejo de errores de validación:
  - Eliminado nonce duplicado
  - Mejorada la visualización de errores por campo
  - Validación en el cliente antes del envío
  - Mejor manejo de respuestas de error del servidor

### 2025-02-08 12:31
#### Corregido
- Validación de campos requeridos:
  - Mejorada la validación en el frontend y backend
  - Corregido el manejo de campos select, radio y checkbox
  - Añadido logging detallado para depuración
  - Mejorados los mensajes de error

### 2025-02-08 12:27
#### Corregido
- Envío de formularios:
  - Corrección de validación de nonce
  - Eliminación de parámetros duplicados
  - Mejor manejo de errores en base de datos
  - Mensajes de error más descriptivos

### 2025-02-08 12:24
#### Añadido
- Funcionalidad de envío de formularios:
  - Manejo de envío AJAX
  - Validación de campos requeridos
  - Mensajes de éxito y error
  - Almacenamiento de entradas en la base de datos
  - Ejecución de acciones (email, webhook)

### 2025-02-08 12:21
#### Mejorado
- Renderizado de shortcode:
  - Verificación de existencia del formulario
  - Validación de estado publicado
  - Mensajes de error descriptivos
  - Logging detallado para depuración

### 2025-02-08 12:14
#### Corregido
- Creación de tablas de base de datos:
  - Separación de consultas SQL para dbDelta
  - Corrección de sintaxis SQL
  - Añadido logging de depuración
  - Carga correcta de wp-admin/includes/upgrade.php

### 2025-02-08 12:11
#### Corregido
- Manejo de formularios:
  - Validación de campos requeridos
  - Mensajes de éxito/error consistentes
  - Manejo de errores de base de datos
  - Valores por defecto para campos opcionales
  - Generación automática de nombres de campo

### 2025-02-08 12:09
#### Corregido
- Esquema de base de datos:
  - Añadido campo 'name' a la tabla de campos
  - Mejorado el logging de errores
  - Corregida la validación de permisos
  - Añadido manejo de errores en guardado

### 2025-02-08 12:06
#### Añadido
- Funcionalidad de guardado de formularios:
  - Guardado de campos con opciones específicas por tipo
  - Guardado de acciones con configuraciones específicas
  - Validación y sanitización de datos
  - Redirección después del guardado

### 2025-02-08 11:45
#### Corregido
- Carga de scripts y estilos en el admin:
  - Corrección de hooks específicos para páginas del plugin
  - Carga explícita de jQuery y dependencias
  - Corrección de URLs de recursos
  - Depuración y logging mejorado

### 2025-02-08 11:44
#### Corregido
- Carga de scripts y estilos en el admin:
  - Corrección de URL de archivos
  - Carga adecuada de jQuery UI
  - Mensajes de confirmación
  - Localización de textos

### 2025-02-08 11:38
#### Añadido
- API REST:
  - Endpoints CRUD para formularios
  - Autenticación y permisos
  - Documentación de endpoints
  - Paginación y ordenamiento
  - Esquema de datos validado

### 2025-02-08 11:35
#### Añadido
- Integración SMTP:
  - Configuración SMTP completa
  - Soporte para TLS y SSL
  - Prueba de conexión SMTP
  - Personalización de remitente
  - Integración con wp_mail

### 2025-02-08 11:31
#### Añadido
- Sistema completo de manejo de formularios:
  - Procesamiento de envíos vía AJAX
  - Validación de campos
  - Manejo de subida de archivos
  - Procesamiento de acciones (email, webhook)
- Interfaz frontend:
  - Estilos CSS modernos y responsivos
  - JavaScript para manejo de envíos
  - Mensajes de éxito/error
  - Validación en tiempo real
- Integración con WordPress:
  - Shortcode `[digitalia_form id="X"]`
  - Carga automática de assets
  - Integración con wp-ajax

### 2025-02-08 11:30
#### Añadido
- Interfaz de administración completa:
  - Lista de formularios con acciones (editar, eliminar, ver entradas)
  - Página de edición de formularios con campos dinámicos
  - Sistema de arrastrar y soltar para ordenar campos
  - Soporte para múltiples tipos de campos:
    - Texto corto
    - Email
    - Teléfono
    - Área de texto
    - Selección
    - Radio
    - Casilla
    - Archivo
  - Sistema de acciones de formulario:
    - Envío de email
    - Webhook
    - Notificaciones
  - Estilos CSS modernos y responsivos
  - JavaScript para manejo dinámico de campos y acciones

### 2025-02-08
#### Añadido
- Creación inicial del proyecto
- Documentación base del proyecto (project.md)
- Archivo de registro de cambios (changelog.md)
- Estructura base del plugin:
  - Archivo principal del plugin (digitalia-forms.php)
  - Clase principal Plugin.php
  - Sistema de activación/desactivación
  - Estructura de directorios
  - Esquema inicial de base de datos
  - Sistema de capacidades de WordPress

## [1.0.x] - 2025-02-09
### Added
- Added permanent field keys to form fields that remain unchanged even when labels are modified
- Added field key validation to ensure proper format (lowercase letters, numbers, hyphens, and underscores only)
- Added improved debugging and logging in JavaScript for form submissions

### Changed
- Modified form data storage to use field keys instead of IDs for consistency
- Updated form field editor to show readonly field keys after initial save
- Enhanced JavaScript logging to include field labels and more readable form data output
- Fixed form rendering to properly use field keys in HTML attributes
- Improved form submission handling to consistently use field keys
- Enhanced error logging and validation messages

### Fixed
- Fixed form submission data not being properly stored in post meta
- Fixed field key handling in form generation and submission
- Added better validation and fallback for missing field keys
- Improved error logging and debugging information
- Fixed form fields not displaying in frontend
- Fixed field key persistence in form editor

### Security
- Added proper sanitization for field keys
- Added validation for field key format
- Added readonly protection for field keys after initial save

## [1.0.x] - 2025-02-10
### Fixed
- Fixed field key not being saved in form editor
- Fixed form fields not displaying in frontend
- Fixed form submission handling with field keys
- Added automatic field key generation based on label
- Added proper validation for field keys in form editor
- Improved error logging for debugging form issues

### Changed
- Updated form rendering to use field keys consistently
- Enhanced field key handling in form submissions
- Improved JavaScript field key generation and validation
- Added better error messages for missing or invalid fields

### Added
- Added automatic field key generation from labels
- Added field key uniqueness validation
- Added improved debugging logs for form fields

## [Unreleased]
### Changed
- Refactorizado el sistema de formularios para usar Custom Post Types
- Mejorado el manejo de campos y configuraciones usando meta datos de WordPress
- Actualizado el sistema de plantillas para formularios
- Añadida página individual para cada formulario
- Mejorado el sistema de notificaciones por email
- Actualizado el sistema de capacidades para usar el mapeo de meta capacidades de WordPress
- Mejorada la validación de permisos en el envío de formularios
- Actualizada la gestión de entradas para usar el sistema de posts de WordPress
- Añadidas capacidades específicas para formularios y entradas al rol de administrador

### Fixed
- Corregido el manejo de capacidades para entradas de formulario
- Actualizada la lista de formularios para usar WP_Query en lugar de tablas personalizadas
- Mejorado el sistema de permisos para la creación y edición de entradas
- Corregidos los mensajes de error en la interfaz de administración
- Añadido método save_form faltante para la creación y actualización de formularios
- Corregido el acceso a formularios y entradas para usuarios administradores
- Corregido el error de carga de scripts frontend
- Mejorada la localización de variables JavaScript para el frontend
- Corregido el almacenamiento de datos de formularios usando post meta
- Actualizado el sistema de almacenamiento de campos de formulario para usar post meta
- Corregido el manejo de IDs de campos en el envío de formularios
- Mejorada la consistencia en el formato de nombres de campos entre frontend y backend
- Mejorado el almacenamiento de datos de formulario usando meta individual y combinado
- Corregida la visualización de datos de formulario en el panel de administración
