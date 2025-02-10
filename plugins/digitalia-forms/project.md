# Digitalia Forms - Plugin de Formularios para WordPress

## Descripción
Plugin de formularios avanzado para WordPress que permite la creación y gestión de formularios personalizados con múltiples funcionalidades y acciones.

## Características Principales

### 1. Gestión de Formularios desde WP Admin
- Creación y edición de formularios desde el panel de administración
- Interfaz intuitiva para la gestión de formularios
- Sistema de previsualización de formularios

### 2. Campos y Shortcodes
- Título personalizable para cada formulario
- Implementación mediante shortcodes en el frontend
- Tipos de campos disponibles:
  - Texto corto
  - Texto largo
  - Email
  - Teléfono
  - Selección única
  - Selección múltiple
  - Fecha
  - Archivo
  - Y otros campos personalizables

### 3. Integración SMTP y Acciones
- Página de configuración SMTP
- Acciones disponibles post-envío:
  - Envío de correo electrónico
  - Notificaciones en pantalla
  - Integración con webhooks
  - Redirección personalizada

### 4. Personalización de Mensajes
- Editor de plantillas de correo electrónico
- Soporte para variables de campos del formulario
- Personalización del formato HTML/texto plano

### 5. Gestión de Entradas
- Custom Post Type 'digitalia_form_entry' para entradas de formulario
- Campos de formulario almacenados como post meta
- Vista dedicada para revisar entradas por formulario
- Sistema de filtrado y búsqueda integrado con WP_Query
- Marcado de estado de entradas usando estados de post (publish/draft)
- Aprovechamiento de funciones nativas de WordPress para:
  - Eliminación de entradas
  - Gestión de metadatos
  - Consultas y filtrado
  - Permisos y capacidades

### 6. Exportación de Datos
- Exportación a CSV
- Selección de campos a exportar
- Filtros de exportación por fecha
- Integración con WP_Query para exportación

### 7. API REST
- Endpoints para:
  - Listar formularios
  - Obtener estructura de formulario
  - Enviar entradas (creación de posts)
  - Consultar entradas (WP REST API)
  - Gestionar configuraciones

## Seguridad
- Protección CSRF en todos los formularios
- Sanitización de entradas y validación de datos
- Límites y validación de carga de archivos
- Límite de tasa para envíos de formularios
- Integración de Captcha/Anti-spam
- Roles y permisos de WordPress
- Encriptación de datos sensibles

## Rendimiento
- Manejo optimizado de envíos masivos
- Límites configurables de tamaño de archivo
- Aprovechamiento de índices nativos de WordPress
- Sistema de caché para formularios
- Carga diferida de recursos
- Optimización de consultas usando WP_Query

## Requisitos Técnicos
### WordPress
- Versión mínima: 5.8+
- Roles requeridos: administrator, editor

### Servidor
- PHP 7.4+
- Extensiones PHP requeridas:
  - mysqli o pdo_mysql
  - json
  - mbstring
  - fileinfo
- MySQL 5.7+ o MariaDB 10.3+
- Memoria recomendada: 128MB+

### Navegadores Soportados
- Chrome (últimas 2 versiones)
- Firefox (últimas 2 versiones)
- Safari (últimas 2 versiones)
- Edge (últimas 2 versiones)

### Estructura de Base de Datos
```sql
-- Tablas principales
digitalia_forms              # Configuración de formularios
digitalia_forms_fields       # Campos de formularios

-- Entradas almacenadas como Custom Post Type
wp_posts                     # Entradas como 'digitalia_form_entry'
wp_postmeta                 # Campos de formulario como meta datos
```

## Guías de Desarrollo
### Estándares de Código
- PSR-12 para PHP
- WordPress Coding Standards
- ESLint para JavaScript
- SASS Guidelines

### Localización
- Textos en español por defecto
- Soporte completo para traducciones
- Archivos .pot/.po/.mo

## Estructura del Proyecto
```
digitalia-forms/
├── admin/           # Archivos de administración
├── includes/        # Clases principales
│   ├── Core/       # Funcionalidad central
│   ├── PostTypes/  # Definiciones de Custom Post Types
│   └── Database/   # Manejo de formularios (no entradas)
├── public/         # Archivos públicos
├── templates/      # Plantillas
└── api/           # Endpoints de API REST
```

## Tecnologías
- PHP 7.4+
- WordPress 5.8+
- MySQL/MariaDB
- JavaScript/jQuery
- CSS/SASS

## Ventajas del Nuevo Enfoque
1. **Integración Nativa con WordPress**
   - Uso de funciones nativas de WordPress para CRUD de entradas
   - Mejor integración con plugins y temas
   - Soporte para revisiones y papelera

2. **Mejor Rendimiento**
   - Aprovechamiento de índices de WordPress
   - Menos tablas personalizadas
   - Queries optimizadas por WordPress

3. **Mantenibilidad**
   - Menos código personalizado
   - Uso de funciones WordPress probadas
   - Mejor integración con backups y migraciones

4. **Extensibilidad**
   - Hooks nativos de WordPress para posts
   - Fácil integración con otros plugins
   - API REST lista para usar
