@extends('layouts.app')

@section('title', 'Cronómetro')

@section('content')
<div class="card">
    <h1>Cronómetro</h1>
    <p>Medidor de tiempo con precisión de milisegundos</p>
    
    <div class="stopwatch-display" id="display">00:00:00.000</div>
    
    <div class="stopwatch-controls">
        <button onclick="iniciar()" class="btn btn-primary" id="btnIniciar">Iniciar</button>
        <button onclick="pausar()" class="btn" id="btnPausar" disabled>Pausar</button>
        <button onclick="reiniciar()" class="btn btn-danger">Reiniciar</button>
        <button onclick="registrarVuelta()" class="btn" id="btnVuelta" disabled>Vuelta</button>
    </div>
    
    <div id="vueltas" style="margin-top: 30px;"></div>
</div>

<script>
let tiempoInicio = 0;
let tiempoTranscurrido = 0;
let corriendo = false;
let intervalo = null;
let vueltas = [];

function formatearTiempo(ms) {
    const horas = Math.floor(ms / 3600000);
    const minutos = Math.floor((ms % 3600000) / 60000);
    const segundos = Math.floor((ms % 60000) / 1000);
    const milisegundos = ms % 1000;
    
    return `${String(horas).padStart(2, '0')}:${String(minutos).padStart(2, '0')}:${String(segundos).padStart(2, '0')}.${String(milisegundos).padStart(3, '0')}`;
}

function actualizar() {
    const tiempoActual = Date.now() - tiempoInicio + tiempoTranscurrido;
    document.getElementById('display').textContent = formatearTiempo(tiempoActual);
}

function iniciar() {
    if (!corriendo) {
        tiempoInicio = Date.now();
        intervalo = setInterval(actualizar, 10);
        corriendo = true;
        document.getElementById('btnIniciar').disabled = true;
        document.getElementById('btnPausar').disabled = false;
        document.getElementById('btnVuelta').disabled = false;
    }
}

function pausar() {
    if (corriendo) {
        clearInterval(intervalo);
        tiempoTranscurrido += Date.now() - tiempoInicio;
        corriendo = false;
        document.getElementById('btnIniciar').disabled = false;
        document.getElementById('btnPausar').disabled = true;
        document.getElementById('btnVuelta').disabled = true;
    }
}

function reiniciar() {
    clearInterval(intervalo);
    tiempoInicio = 0;
    tiempoTranscurrido = 0;
    corriendo = false;
    vueltas = [];
    document.getElementById('display').textContent = '00:00:00.000';
    document.getElementById('vueltas').innerHTML = '';
    document.getElementById('btnIniciar').disabled = false;
    document.getElementById('btnPausar').disabled = true;
    document.getElementById('btnVuelta').disabled = true;
}

function registrarVuelta() {
    if (corriendo) {
        const tiempoActual = Date.now() - tiempoInicio + tiempoTranscurrido;
        vueltas.push(tiempoActual);
        mostrarVueltas();
    }
}

function mostrarVueltas() {
    const contenedor = document.getElementById('vueltas');
    let html = '<h3 style="margin-bottom: 15px; border-bottom: 2px solid #000; padding-bottom: 10px;">Vueltas Registradas</h3>';
    html += '<table><thead><tr><th>Vuelta</th><th>Tiempo</th></tr></thead><tbody>';
    
    vueltas.forEach((tiempo, index) => {
        html += `<tr><td>Vuelta ${index + 1}</td><td>${formatearTiempo(tiempo)}</td></tr>`;
    });
    
    html += '</tbody></table>';
    contenedor.innerHTML = html;
}
</script>
@endsection
