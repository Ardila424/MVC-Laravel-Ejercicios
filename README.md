# MVC Laravel - 10 Mini Aplicaciones

Proyecto Laravel con 10 aplicaciones web usando estilo visual "manual/brutal".

## 🛠️ Tecnologías

- **Laravel 11**
- **PHP 8.2+**
- **MySQL** (vía WAMP)
- **Blade Templates**
- **JavaScript Vanilla**

## 📦 Instalación

1. **Clonar repositorio:**
```bash
git clone https://github.com/Ardila424/MVC-Laravel-Ejercicios.git
cd MVC-Laravel-Ejercicios
```

2. **Instalar dependencias:**
```bash
composer install
```

3. **Configurar `.env`:**
```bash
cp .env.example .env
php artisan key:generate
```

Editar `.env` y configurar MySQL:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mvc_ejercicios
DB_USERNAME=root
DB_PASSWORD=
```

4. **Crear base de datos en phpMyAdmin:**
- Base de datos: `mvc_ejercicios`

5. **Ejecutar migraciones:**
```bash
php artisan migrate
```

## 🚀 Uso

**Iniciar servidor:**
```bash
php artisan serve
```

**Acceder en navegador:**
```
http://localhost:8000
```

O con WAMP:
```
http://localhost/MVC-Laravel-Ejercicios/public
```

## 📱 Aplicaciones

1. **Lista de Tareas** - CRUD con MySQL
2. **Calculadora de Propinas** - Cálculo de porcentajes
3. **Generador de Contraseñas** - 12 caracteres aleatorios
4. **Gestor de Gastos** - CRUD con categorías (COP)
5. **Sistema de Reservas** - CRUD con fecha/hora
6. **Gestor de Notas** - CRUD con categorías
7. **Calendario de Eventos** - Próximos 10 eventos
8. **Juego de Memoria** - Grid 4x4 con JavaScript
9. **Plataforma de Encuestas** - Sistema completo con relaciones
10. **Cronómetro** - Con laps y milisegundos

## 🎨 Diseño

Estilo "manual/brutal": bordes negros gruesos, fuente Courier New, sin sombras ni gradientes.

## 📄 Licencia

MIT
