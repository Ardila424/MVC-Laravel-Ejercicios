@extends('layouts.app')

@section('title', 'Juego de Memoria')

@section('content')
<div class="card">
    <h1>Juego de Memoria</h1>
    <p>Encuentra todos los pares de cartas</p>
    
    <div style="text-align: center; margin: 20px 0;">
        <p><strong>Intentos:</strong> <span id="intentos">0</span></p>
        <button onclick="reiniciarJuego()" class="btn btn-primary">Reiniciar Juego</button>
    </div>
    
    <div class="memory-grid" id="memoryGrid"></div>
</div>

<script>
let numeros = [1, 2, 3, 4, 5, 6, 7, 8, 1, 2, 3, 4, 5, 6, 7, 8];
let cartasVolteadas = [];
let cartasEncontradas = [];
let intentos = 0;
let bloqueado = false;

function mezclarArray(array) {
    for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
    }
    return array;
}

function crearTablero() {
    const grid = document.getElementById('memoryGrid');
    grid.innerHTML = '';
    const numerosMezclados = mezclarArray([...numeros]);
    
    numerosMezclados.forEach((numero, index) => {
        const carta = document.createElement('div');
        carta.className = 'memory-card';
        carta.dataset.numero = numero;
        carta.dataset.index = index;
        carta.onclick = () => voltearCarta(carta);
        grid.appendChild(carta);
    });
}

function voltearCarta(carta) {
    if (bloqueado || carta.classList.contains('flipped') || carta.classList.contains('matched')) {
        return;
    }
    
    carta.classList.add('flipped');
    carta.textContent = carta.dataset.numero;
    cartasVolteadas.push(carta);
    
    if (cartasVolteadas.length === 2) {
        verificarPar();
    }
}

function verificarPar() {
    bloqueado = true;
    intentos++;
    document.getElementById('intentos').textContent = intentos;
    
    const [carta1, carta2] = cartasVolteadas;
    
    if (carta1.dataset.numero === carta2.dataset.numero) {
        carta1.classList.add('matched');
        carta2.classList.add('matched');
        cartasEncontradas.push(carta1, carta2);
        cartasVolteadas = [];
        bloqueado = false;
        
        if (cartasEncontradas.length === numeros.length) {
            setTimeout(() => alert(`¡Felicidades! Completaste el juego en ${intentos} intentos`), 300);
        }
    } else {
        setTimeout(() => {
            carta1.classList.remove('flipped');
            carta2.classList.remove('flipped');
            carta1.textContent = '';
            carta2.textContent = '';
            cartasVolteadas = [];
            bloqueado = false;
        }, 1000);
    }
}

function reiniciarJuego() {
    cartasVolteadas = [];
    cartasEncontradas = [];
    intentos = 0;
    bloqueado = false;
    document.getElementById('intentos').textContent = '0';
    crearTablero();
}

// Iniciar juego al cargar
crearTablero();
</script>
@endsection
