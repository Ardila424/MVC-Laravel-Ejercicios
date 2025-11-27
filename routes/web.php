<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\PropinasController;
use App\Http\Controllers\ContrasenasController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\NotasController;

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

// FASE 2: Siguientes 7 Aplicaciones

// App #4: Gestor de Gastos
Route::get('/gastos', [GastosController::class, 'index'])->name('gastos.index');
Route::post('/gastos', [GastosController::class, 'store'])->name('gastos.store');
Route::delete('/gastos/{id}', [GastosController::class, 'destroy'])->name('gastos.destroy');

// App #5: Sistema de Reservas
Route::get('/reservas', [ReservasController::class, 'index'])->name('reservas.index');
Route::post('/reservas', [ReservasController::class, 'store'])->name('reservas.store');
Route::delete('/reservas/{id}', [ReservasController::class, 'destroy'])->name('reservas.destroy');

// App #6: Gestor de Notas
Route::get('/notas', [NotasController::class, 'index'])->name('notas.index');
Route::get('/notas/create', [NotasController::class, 'create'])->name('notas.create');
Route::post('/notas', [NotasController::class, 'store'])->name('notas.store');
Route::get('/notas/{id}/edit', [NotasController::class, 'edit'])->name('notas.edit');
Route::put('/notas/{id}', [NotasController::class, 'update'])->name('notas.update');
Route::delete('/notas/{id}', [NotasController::class, 'destroy'])->name('notas.destroy');

// App #7: Calendario de Eventos (placeholder)
Route::get('/calendario', function() { return view('home'); })->name('calendario.index');

// App #8: Juego de Memoria (placeholder)
Route::get('/memoria', function() { return view('home'); })->name('memoria.index');

// App #9: Plataforma de Encuestas (placeholder)
Route::get('/encuestas', function() { return view('home'); })->name('encuestas.index');

// App #10: Cronómetro (placeholder)
Route::get('/cronometro', function() { return view('home'); })->name('cronometro.index');
