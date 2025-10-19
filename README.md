# Aplicación de Recursos Humanos

![Laravel](https://img.shields.io/badge/Laravel-11.x-red.svg)
![React](https://img.shields.io/badge/React-18.x-blue.svg)
![Inertia.js](https://img.shields.io/badge/Inertia.js-1.x-purple.svg)
![MySQL](https://img.shields.io/badge/MySQL-8.x-orange.svg)
![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)

## Descripción

Esta aplicación de recursos humanos está diseñada para facilitar la gestión de empleados en una organización, permitiendo realizar diversas acciones clave como:

- **Registro y gestión de usuarios**: Alta y baja de empleados.
- **Control de fichajes**: Registros de entradas y salidas de los empleados.
- **Solicitudes de vacaciones**: Sistema para solicitar y gestionar las vacaciones del personal.
- **Gestión de documentación**: Almacenamiento y manejo de documentos importantes, como contratos, permisos, y otros archivos relacionados con los empleados.

## 👨‍💻 Mi participación en el proyecto

### 🎯 **Rol**: Desarrollador Backend

### 🔧 **Funcionalidades desarrolladas por mí**:

#### 📧 **Sistema de Notificaciones en Tiempo Real**
- **Arquitectura Event-Driven**: Implementé un sistema completo basado en Events y Listeners para notificaciones automáticas
- **Service Pattern**: `GenericNotificationService` centraliza toda la lógica de notificaciones
- **Múltiples canales**: Database, Mail (Brevo), Broadcast para tiempo real con configuración flexible
- **Sistema de colas**: Procesamiento asíncrono con Laravel Jobs (`CreateNotificationRecord`) para mejor performance
- **Destinatarios inteligentes**: Por roles, permisos, relaciones complejas (departamentos, managers, empleados)
- **Plantillas dinámicas**: Sistema de templates basado en roles y contexto del usuario con variables personalizadas
- **Integración Brevo**: Canal personalizado (`BrevoChannel`) con templates específicos y mapeo de variables dinámicas
- **Notificaciones programadas**: Para envío en fechas futuras con cancelación automática

#### 💻 **Código destacado**:
```php
// Ejemplo de uso del sistema de notificaciones
class NotificarEmpresaActualizada
{
    use GenericNotificationTrait;

    public function handle(EmpresaActualizada $event): void
    {
        // Envío automático con configuración declarativa
        $this->sendNotification($event->empresa, 'updated', [
            'updated_by' => auth()->user()->name ?? 'Sistema',
            'updated_at' => now()->format('Y-m-d H:i:s')
        ]);
    }
}
```

```php
// Configuración flexible en notifications.php
'empresa' => [
    'updated' => [
        'recipients' => ['user_ids' => [1]],
        'channels' => ['broadcast', 'mail', 'database'],
        'templates' => [
            'title' => 'Empresa Actualizada: {nombre}',
            'content' => 'Se ha actualizado la información de la empresa: {nombre}'
        ]
    ]
]
```

#### 🛠️ **Tecnologías Backend que dominé**:
- **Laravel 11** - Framework principal del backend
- **Laravel Queues** - Sistema de colas para procesamiento asíncrono
- **Brevo API** - Servicio de envío de emails transaccionales
- **MySQL** - Base de datos para almacenamiento de notificaciones
- **Laravel Notifications** - Sistema nativo de notificaciones de Laravel
- **Event Broadcasting** - Para notificaciones en tiempo real

### 🚀 **Impacto del desarrollo**:
- ✅ **Mejora en UX**: Los usuarios reciben notificaciones instantáneas sin recargar la página
- ✅ **Performance optimizada**: Las colas evitan bloqueos en la aplicación principal
- ✅ **Escalabilidad**: El sistema puede manejar múltiples notificaciones simultáneas con Jobs
- ✅ **Confiabilidad**: Las notificaciones se procesan de forma asíncrona y segura con manejo de errores
- ✅ **Flexibilidad**: Sistema configurable que se adapta a diferentes tipos de notificaciones
- ✅ **Mantenibilidad**: Código modular y bien documentado para fácil extensión

#### 📊 **Estadísticas del sistema**:
- **Archivos principales**: 10+ componentes especializados
- **Canales soportados**: Database, Mail (Brevo), Broadcast
- **Tipos de destinatarios**: Roles, permisos, relaciones complejas
- **Templates disponibles**: 20+ plantillas específicas por contexto
- **Jobs implementados**: Procesamiento asíncrono con manejo de errores

## Tecnologías utilizadas

La aplicación está construida utilizando las siguientes tecnologías:

- **Backend**: [Laravel](https://laravel.com/) - Framework PHP para la gestión del servidor, base de datos y lógica de negocio.
- **Frontend**: [React.js](https://reactjs.org/) con [Inertia.js](https://inertiajs.com/) - Para crear una experiencia de usuario dinámica y moderna con un enfoque sin recarga de páginas.
- **Autenticación y seguridad**: Integración de autenticación con [Laravel Jetstream](https://jetstream.laravel.com/) utilizando verificación en dos pasos (2FA) y login con Google.
- **Base de datos**: [MySQL](https://www.mysql.com/) - Para el almacenamiento de los datos de los empleados, fichajes, vacaciones y documentos.
- **Despliegue**: [Docker](https://www.docker.com/) - Para un entorno de desarrollo consistente y fácil despliegue.
  
## Funcionalidades principales

1. **Gestión de usuarios**: 
   - Alta y baja de empleados con roles y permisos personalizados.
   - Edición de información del perfil de los empleados.
   
2. **Control de fichajes**: 
   - Registro de entradas y salidas diarias de los empleados.
   - Reportes de asistencia y análisis de horarios.

3. **Gestión de vacaciones**:
   - Solicitud de vacaciones con aprobación por parte de los supervisores.
   - Gestión de días disponibles y acumulados.

4. **Gestión de documentación**:
   - Subida y almacenamiento de documentos importantes.
   - Gestión de contratos, certificados y otros archivos relacionados con los empleados.

## Requisitos previos

- [Node.js](https://nodejs.org/) y [npm](https://www.npmjs.com/)
- [PHP](https://www.php.net/) >= 8.0
- [Composer](https://getcomposer.org/)
- [MySQL](https://www.mysql.com/)
- [Docker](https://www.docker.com/) (opcional para despliegue)



## 🛠️ Instalación y primeros pasos según la última migración a MySQL

1. **Clona el repositorio y entra en la carpeta:**
   ```bash
   git clone git@github.com:React-Inertia-Breeze-Tailwind-Socialite
   cd React-Inertia-Breeze-Tailwind-Socialite
   ```

2. **Instala dependencias:**
   ```bash
   composer install
   npm install
   ```

3. **Configura tu archivo `.env` y la base de datos:**
   - Usa MySQL con colación `utf8mb4_spanish_ci` para ordenación correcta de tildes.
   - Ejemplo en `.env`:
     ```
     DB_CONNECTION=mysql
     DB_COLLATION=utf8mb4_spanish_ci
     DB_CHARSET=utf8mb4
     ```

4. **Ejecuta migraciones y seeders (¡IMPORTANTE!):**
   ```bash
   php artisan migrate:fresh --seed
   ```
   > ⚠️ Esto es necesario tras los últimos cambios en migraciones y seeders.

5. **Inicia el servidor:**
   ```bash
   php artisan serve
   npm run dev
   ```

## ⚠️ Cambios recientes importantes

- **Migraciones:**  
  - `users.status` ahora es `tinyInteger`.
  - `jornada_turno.weekday_number` ahora es `enum` de strings.
  - `permisos.descripcion_oficial` ahora es `text`.
  - `permisos.duracion` ahora es `unsignedBigInteger` y permite `null`.
- **Seeders:**  
  - Adaptados a los nuevos tipos y restricciones.
  - Uso de `null` para duraciones indeterminadas.
  - Truncado de descripciones largas en roles.
- **Colación:**  
  - Configurada a `utf8mb4_spanish_ci` para ordenación correcta en español.

## 📝 Guía de uso para el usuario final

1. Accede a la pantalla de gestión de empleados.
2. Haz clic en el botón de elipsis ⋯ (Exportar/Importar) en la barra de herramientas de la tabla.
3. Selecciona el formato de exportación deseado (CSV, XLS, PDF) o la opción de importar.
4. El archivo se descargará automáticamente en tu dispositivo.
5. Si ocurre algún error, se mostrará una notificación.

## 🧑‍💻 Para desarrolladores

- Si ves errores de migración o seeders, asegúrate de tener la última versión de la rama y ejecuta `php artisan migrate:fresh --seed`.
- Si tienes seeders personalizados, revisa que sean compatibles con los nuevos tipos de columnas.
- Para dudas, revisa la documentación en Notion o pregunta en el canal de desarrollo.

