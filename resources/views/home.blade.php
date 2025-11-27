@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
<div class="card">
    <h1>Bienvenido a MVC Laravel</h1>
    <p>Elige una aplicación del menú lateral para comenzar.</p>
    
    <div style="margin-top: 30px;">
        <h3 style="margin-bottom: 15px; border-bottom: 2px solid #000; padding-bottom: 10px;">Aplicaciones Disponibles</h3>
        
        <div class="grid">
            <div class="grid-item">
                <h4 style="text-transform: uppercase; margin-bottom: 10px;">Fase 1</h4>
                <ul style="line-height: 2; list-style: none;">
                    <li>→ <a href="{{ route('tareas.index') }}" style="color: #000; text-decoration: underline;">Lista de Tareas</a></li>
                    <li>→ <a href="{{ route('propinas.index') }}" style="color: #000; text-decoration: underline;">Calculadora de Propinas</a></li>
                    <li>→ <a href="{{ route('contrasenas.index') }}" style="color: #000; text-decoration: underline;">Generador de Contraseñas</a></li>
                </ul>
            </div>
            
            <div class="grid-item">
                <h4 style="text-transform: uppercase; margin-bottom: 10px;">Fase 2</h4>
                <ul style="line-height: 2; list-style: none;">
                    <li>→ <a href="{{ route('gastos.index') }}" style="color: #000; text-decoration: underline;">Gestor de Gastos</a></li>
                    <li>→ <a href="{{ route('reservas.index') }}" style="color: #000; text-decoration: underline;">Sistema de Reservas</a></li>
                    <li>→ <a href="{{ route('notas.index') }}" style="color: #000; text-decoration: underline;">Gestor de Notas</a></li>
                    <li>→ <a href="{{ route('calendario.index') }}" style="color: #000; text-decoration: underline;">Calendario de Eventos</a></li>
                </ul>
            </div>
            
            <div class="grid-item">
                <h4 style="text-transform: uppercase; margin-bottom: 10px;">Juegos & Herramientas</h4>
                <ul style="line-height: 2; list-style: none;">
                    <li>→ <a href="{{ route('memoria.index') }}" style="color: #000; text-decoration: underline;">Juego de Memoria</a></li>
                    <li>→ <a href="{{ route('encuestas.index') }}" style="color: #000; text-decoration: underline;">Plataforma de Encuestas</a></li>
                    <li>→ <a href="{{ route('cronometro.index') }}" style="color: #000; text-decoration: underline;">Cronómetro</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
