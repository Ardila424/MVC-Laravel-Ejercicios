<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC Laravel - @yield('title', 'Inicio')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <h2>MVC Laravel</h2>
            <nav>
                <a href="{{ route('home') }}" class="nav-link">Inicio</a>
                <a href="{{ route('tareas.index') }}" class="nav-link">1. Lista de Tareas</a>
                <a href="{{ route('propinas.index') }}" class="nav-link">2. Calculadora de Propinas</a>
                <a href="{{ route('contrasenas.index') }}" class="nav-link">3. Generador de Contraseñas</a>
                <a href="{{ route('gastos.index') }}" class="nav-link">4. Gestor de Gastos</a>
                <a href="{{ route('reservas.index') }}" class="nav-link">5. Sistema de Reservas</a>
                <a href="{{ route('notas.index') }}" class="nav-link">6. Gestor de Notas</a>
                <a href="{{ route('calendario.index') }}" class="nav-link">7. Calendario de Eventos</a>
                <a href="{{ route('memoria.index') }}" class="nav-link">8. Juego de Memoria</a>
                <a href="{{ route('encuestas.index') }}" class="nav-link">9. Plataforma de Encuestas</a>
                <a href="{{ route('cronometro.index') }}" class="nav-link">10. Cronómetro</a>
            </nav>
        </aside>
        
        <div class="content">
            @yield('content')
        </div>
    </div>
</body>
</html>
