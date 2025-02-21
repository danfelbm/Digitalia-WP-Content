# Manual de Administrador - Configuración del Sistema Moodle

## Tabla de Contenidos

1. [Introducción](#introducción)
2. [Gestión de Usuarios](#gestión-de-usuarios)
   - [Añadir Usuarios](#añadir-usuarios)
   - [Gestión de Roles](#gestión-de-roles)
   - [Matriculación de Usuarios](#matriculación-de-usuarios)
3. [Gestión de Cursos](#gestión-de-cursos)
   - [Categorías de Cursos](#categorías-de-cursos)
   - [Crear y Configurar Cursos](#crear-y-configurar-cursos)
4. [Configuración General del Sistema](#configuración-general-del-sistema)
   - [Ajustes del Sitio](#ajustes-del-sitio)
   - [Configuración de Seguridad](#configuración-de-seguridad)
   - [Plugins y Funcionalidades](#plugins-y-funcionalidades)

## Introducción

Este manual está diseñado para administradores del sistema Moodle, centrándose en las tareas esenciales de administración como la gestión de usuarios, cursos y configuraciones del sistema. No incluye aspectos de personalización visual o temas.

![Panel de administración](moodle_assets/1.jpg)

## Gestión de Usuarios

### Añadir Usuarios

#### Añadir Usuario Individual
1. Ve a "Administración del sitio" > "Usuarios" > "Cuentas" > "Agregar usuario"
2. Completa la información requerida:
   - Nombre y apellidos
   - Nombre de usuario
   - Correo electrónico
   - Contraseña
   - Ciudad/población
   - País
3. Configura opciones adicionales:
   - Preferencias de usuario
   - Idioma preferido
   - Zona horaria

![Añadir usuario](moodle_assets/2.jpg)

#### Subida Masiva de Usuarios
1. Ve a "Administración del sitio" > "Usuarios" > "Cuentas" > "Subir usuarios"
2. Prepara el archivo CSV con los datos de usuarios
3. Sube el archivo y verifica el formato
4. Confirma la subida y revisa el resultado

![Subida masiva de usuarios](moodle_assets/3.jpg)

### Gestión de Roles

#### Configurar Roles del Sistema
1. Ve a "Administración del sitio" > "Usuarios" > "Permisos" > "Definir roles"
2. Roles predeterminados:
   - Administrador
   - Gestor
   - Profesor
   - Profesor sin permiso de edición
   - Estudiante
3. Para cada rol puedes:
   - Editar permisos
   - Crear nuevos roles
   - Gestionar capacidades

![Gestión de roles](moodle_assets/4.jpg)

### Matriculación de Usuarios

#### Métodos de Matriculación
1. Ve a "Administración del sitio" > "Plugins" > "Matriculación"
2. Configura los métodos disponibles:
   - Matriculación manual
   - Auto-matriculación
   - Cohortes
   - Acceso de invitados

#### Matricular Usuarios en Cursos
1. Accede al curso
2. Ve a "Participantes" > "Matricular usuarios"
3. Selecciona:
   - Usuario(s)
   - Rol
   - Duración de la matriculación

![Matriculación de usuarios](moodle_assets/5.jpg)

## Gestión de Cursos

### Categorías de Cursos

#### Crear Categorías
1. Ve a "Administración del sitio" > "Cursos" > "Administrar cursos y categorías"
2. Selecciona "Crear nueva categoría"
3. Define:
   - Nombre de categoría
   - Número ID (opcional)
   - Descripción
   - Categoría padre (si aplica)

![Categorías de cursos](moodle_assets/6.jpg)

### Crear y Configurar Cursos

#### Crear Nuevo Curso
1. Ve a "Administración del sitio" > "Cursos" > "Agregar nuevo curso"
2. Configura los detalles básicos:
   - Nombre completo
   - Nombre corto
   - Categoría del curso
   - Fecha de inicio
   - Formato del curso

#### Configuración del Curso
1. Ajusta la configuración general:
   - Visibilidad
   - Formato de curso
   - Número de secciones
   - Tamaño máximo de archivos
2. Configura opciones de finalización:
   - Seguimiento de finalización
   - Criterios de finalización
   - Restricciones de acceso

![Configuración de cursos](moodle_assets/7.jpg)

## Configuración General del Sistema

### Ajustes del Sitio

#### Configuración Principal
1. Ve a "Administración del sitio" > "General"
2. Configura:
   - Nombre del sitio
   - Página principal
   - Idioma predeterminado
   - Zona horaria
   - País predeterminado

![Ajustes del sitio](moodle_assets/8.jpg)

### Configuración de Seguridad

#### Políticas del Sitio
1. Ve a "Administración del sitio" > "Seguridad"
2. Configura:
   - Políticas de contraseñas
   - Protección contra spam
   - Políticas del sitio
   - Notificaciones de seguridad

#### Copias de Seguridad
1. Ve a "Administración del sitio" > "Copias de seguridad"
2. Configura:
   - Programación automática
   - Retención de copias
   - Ubicación de almacenamiento

![Configuración de seguridad](moodle_assets/9.jpg)

### Plugins y Funcionalidades

#### Gestión de Plugins
1. Ve a "Administración del sitio" > "Plugins"
2. Administra:
   - Plugins instalados
   - Actualizaciones disponibles
   - Configuración de plugins

#### Configuración de Funcionalidades
1. Activa o desactiva características:
   - Mensajería
   - Calendario
   - Estadísticas
   - Competencias
2. Configura parámetros específicos para cada función

![Gestión de plugins](moodle_assets/10.jpg)

## Consejos y Mejores Prácticas

1. **Seguridad**:
   - Actualiza regularmente el sistema
   - Revisa los registros de actividad
   - Mantén copias de seguridad actualizadas

2. **Gestión de Usuarios**:
   - Organiza usuarios en cohortes
   - Utiliza roles personalizados cuando sea necesario
   - Mantén una estructura clara de permisos

3. **Organización de Cursos**:
   - Establece una estructura clara de categorías
   - Define plantillas de cursos
   - Documenta las políticas de matriculación
