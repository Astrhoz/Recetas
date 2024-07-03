<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Recetero

## Pasos para clonar y empezar a trabajar con un repositorio de GitHub

### 1. Clonar el repositorio
```bash
git clone https://github.com/Drawnskii/Recetero.git
```
Este comando clona el repositorio remoto de GitHub al directorio actual en tu máquina local.

### 2. Navegar al directorio del proyecto
```bash
cd Recetero
```
Este comando cambia el directorio actual al directorio del proyecto recién clonado.

### 3. Instalar dependencias de Composer
```bash
composer install
```
Este comando instala todas las dependencias de PHP especificadas en el archivo `composer.json`.

### 4. Copiar el archivo de configuración de entorno
```bash
copy .env.example .env
```
Este comando copia el archivo `.env.example` a `.env`. El archivo `.env` es utilizado para configurar variables de entorno como la configuración de la base de datos. Descomentar y ajustar la configuración de la base de datos según sea necesario.

### 5. Generar la clave de la aplicación
```bash
php artisan key:generate
```
Este comando genera una nueva clave de aplicación y la configura en el archivo `.env`. La clave es utilizada por Laravel para encriptar datos.

### 6. Ejecutar migraciones de la base de datos
```bash
php artisan migrate
```
Este comando ejecuta las migraciones de la base de datos, creando las tablas necesarias según las definiciones en los archivos de migración.

### 7. Instalar dependencias de Node.js
```bash
npm install
```
Este comando instala todas las dependencias de Node.js especificadas en el archivo `package.json`.

### 8. Construir los activos del proyecto
```bash
php artisan storage:link
```
Este comando crea un enlace simbólico desde el directorio public/storage hacia el directorio storage/app/public. Esto es necesario para que los archivos almacenados sean accesibles públicamente a través de la web.

### 9. Construir los activos del proyecto
```bash
npm run build
```
Este comando compila y construye los activos del proyecto (CSS, JavaScript, etc.) según la configuración especificada en los archivos de configuración de Webpack o similares.

### 10. Iniciar el servidor de desarrollo
```bash
php artisan serve
```
Este comando inicia un servidor de desarrollo en PHP, permitiéndote acceder a la aplicación web desde tu navegador en `http://localhost:8000`.

### 11. Compilar y construir los activos del proyecto
```bash
npm run dev
```
Este comando compila y construye los activos del proyecto (CSS, JavaScript, etc.) según la configuración especificada en los archivos de Webpack o similares.
