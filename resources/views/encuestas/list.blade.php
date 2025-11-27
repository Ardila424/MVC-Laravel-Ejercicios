@extends('layouts.app')

@section('title', 'Plataforma de Encuestas')

@section('content')
<div class="card">
    <h1>Plataforma de Encuestas</h1>
    <p>Crea y responde encuestas</p>
    
    <div style="margin-bottom: 30px;">
        <a href="{{ route('encuestas.create') }}" class="btn btn-primary">+ Nueva Encuesta</a>
    </div>
    
    @if($surveys->isEmpty())
        <div class="alert alert-info">
            No hay encuestas creadas.
        </div>
    @else
        <h3 style="margin-bottom: 15px;">Encuestas Disponibles</h3>
        <div class="grid">
            @foreach($surveys as $survey)
            <div class="grid-item">
                <h4 style="margin-bottom: 10px; text-transform: uppercase;">{{ $survey->title }}</h4>
                <p style="margin: 10px 0; color: #666;">
                    <strong>Respuestas:</strong> {{ $survey->responses_count }}
                </p>
                <div style="margin-top: 15px; display: flex; gap: 10px;">
                    <a href="{{ route('encuestas.answer', $survey->id) }}" class="btn btn-primary btn-sm" style="text-decoration: none;">Responder</a>
                    <a href="{{ route('encuestas.results', $survey->id) }}" class="btn btn-sm" style="text-decoration: none;">Ver Resultados</a>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
