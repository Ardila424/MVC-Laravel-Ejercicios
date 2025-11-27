@extends('layouts.app')

@section('title', 'Crear Encuesta')

@section('content')
<div class="card">
    <h1>Crear Nueva Encuesta</h1>
    <p>Define el título y las preguntas de tu encuesta</p>
    
    <form method="POST" action="{{ route('encuestas.store') }}">
        @csrf
        
        <div class="form-group">
            <label>Título de la Encuesta</label>
            <input type="text" name="title" required>
        </div>
        
        <h3 style="margin: 20px 0 15px; border-bottom: 2px solid #000; padding-bottom: 10px;">Preguntas</h3>
        
        <div id="preguntas">
            <div class="form-group">
                <label>Pregunta 1</label>
                <input type="text" name="questions[]" required>
            </div>
        </div>
        
        <button type="button" onclick="agregarPregunta()" class="btn" style="margin-bottom: 20px;">+ Agregar Pregunta</button>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">Crear Encuesta</button>
            <a href="{{ route('encuestas.index') }}" class="btn" style="text-decoration: none;">Cancelar</a>
        </div>
    </form>
</div>

<script>
let numeroPregunta = 1;

function agregarPregunta() {
    numeroPregunta++;
    const div = document.createElement('div');
    div.className = 'form-group';
    div.innerHTML = `
        <label>Pregunta ${numeroPregunta}</label>
        <input type="text" name="questions[]" required>
    `;
    document.getElementById('preguntas').appendChild(div);
}
</script>
@endsection
