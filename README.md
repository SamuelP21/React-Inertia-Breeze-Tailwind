# Aplicación de Recursos Humanos

## Descripción

Esta aplicación de recursos humanos está diseñada para facilitar la gestión de empleados en una organización, permitiendo realizar diversas acciones clave como:

- **Registro y gestión de usuarios**: Alta y baja de empleados.
- **Control de fichajes**: Registros de entradas y salidas de los empleados.
- **Solicitudes de vacaciones**: Sistema para solicitar y gestionar las vacaciones del personal.
- **Gestión de documentación**: Almacenamiento y manejo de documentos importantes, como contratos, permisos, y otros archivos relacionados con los empleados.

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

