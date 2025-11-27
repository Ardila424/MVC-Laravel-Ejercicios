@extends('layouts.app')

@section('title', 'Generador de Contraseñas')

@section('content')
<div class="card">
    <h1>Generador de Contraseñas</h1>
    <p>Creación de claves seguras (12 caracteres)</p>
    
    <form method="POST" action="{{ route('contrasenas.generar') }}" style="margin-bottom: 30px;">
        @csrf
        <button type="submit" class="btn btn-primary">Generar Nueva Contraseña</button>
    </form>
    
    @if($password)
        <div class="result-box" style="text-align: center;">
            <h3>Tu contraseña segura:</h3>
            <div style="font-family: 'Courier New', monospace; font-size: 1.5em; margin: 20px 0; padding: 15px; background: #f0f0f0; border: 2px solid #000;">
                {{ $password }}
            </div>
            <button onclick="copyPassword()" class="btn btn-secondary">Copiar</button>
        </div>
        
        <script>
        function copyPassword() {
            const text = "{{ $password }}";
            navigator.clipboard.writeText(text).then(function() {
                alert('Contraseña copiada al portapapeles');
            });
        }
        </script>
    @endif
</div>
@endsection
