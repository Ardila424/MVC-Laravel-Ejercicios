<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\PropinasController;
use App\Http\Controllers\ContrasenasController;

// Home
Route::get('/', function () {
    return view('home');
})->name('home');

// FASE 1: Primeras 3 Aplicaciones

// App #1: Lista de Tareas
Route::get('/tareas', [TareasController::class, 'index'])->name('tareas.index');
Route::post('/tareas', [TareasController::class, 'store'])->name('tareas.store');
Route::patch('/tareas/{id}/toggle', [TareasController::class, 'toggle'])->name('tareas.toggle');
Route::delete('/tareas/{id}', [TareasController::class, 'destroy'])->name('tareas.destroy');

// App #2: Calculadora de Propinas
Route::get('/propinas', [PropinasController::class, 'index'])->name('propinas.index');
Route::post('/propinas', [PropinasController::class, 'calcular'])->name('propinas.calcular');

// App #3: Generador de Contraseñas
Route::get('/contrasenas', [ContrasenasController::class, 'index'])->name('contrasenas.index');
Route::post('/contrasenas', [ContrasenasController::class, 'generar'])->name('contrasenas.generar');

// FASE 2: Siguientes 7 Aplicaciones (placeholders - se implementarán después)

// App #4: Gestor de Gastos
Route::get('/gastos', function() { return view('home'); })->name('gastos.index');

// App #5: Sistema de Reservas
Route::get('/reservas', function() { return view('home'); })->name('reservas.index');

// App #6: Gestor de Notas
Route::get('/notas', function() { return view('home'); })->name('notas.index');

// App #7: Calendario de Eventos
Route::get('/calendario', function() { return view('home'); })->name('calendario.index');

// App #8: Juego de Memoria
Route::get('/memoria', function() { return view('home'); })->name('memoria.index');

// App #9: Plataforma de Encuestas
Route::get('/encuestas', function() { return view('home'); })->name('encuestas.index');

// App #10: Cronómetro
Route::get('/cronometro', function() { return view('home'); })->name('cronometro.index');
