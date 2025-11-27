<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TareasController;
use App\Http\Controllers\PropinasController;
use App\Http\Controllers\ContrasenasController;
use App\Http\Controllers\GastosController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\CalendarioController;
use App\Http\Controllers\MemoriaController;
use App\Http\Controllers\EncuestasController;
use App\Http\Controllers\CronometroController;

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

// App #7: Calendario de Eventos
Route::get('/calendario', [CalendarioController::class, 'index'])->name('calendario.index');
Route::post('/calendario', [CalendarioController::class, 'store'])->name('calendario.store');
Route::delete('/calendario/{id}', [CalendarioController::class, 'destroy'])->name('calendario.destroy');

// App #8: Juego de Memoria
Route::get('/memoria', [MemoriaController::class, 'index'])->name('memoria.index');

// App #9: Plataforma de Encuestas
Route::get('/encuestas', [EncuestasController::class, 'index'])->name('encuestas.index');
Route::get('/encuestas/create', [EncuestasController::class, 'create'])->name('encuestas.create');
Route::post('/encuestas', [EncuestasController::class, 'store'])->name('encuestas.store');
Route::get('/encuestas/{id}/answer', [EncuestasController::class, 'answer'])->name('encuestas.answer');
Route::post('/encuestas/{id}/answer', [EncuestasController::class, 'saveAnswer'])->name('encuestas.saveAnswer');
Route::get('/encuestas/{id}/results', [EncuestasController::class, 'results'])->name('encuestas.results');

// App #10: Cronómetro
Route::get('/cronometro', [CronometroController::class, 'index'])->name('cronometro.index');
