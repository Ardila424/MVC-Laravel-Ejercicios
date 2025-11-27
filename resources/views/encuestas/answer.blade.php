@extends('layouts.app')

@section('title', 'Responder Encuesta')

@section('content')
<div class="card">
    <h1>{{ $survey->title }}</h1>
    <p>Responde todas las preguntas de la encuesta</p>
    
    <form method="POST" action="{{ route('encuestas.saveAnswer', $survey->id) }}">
        @csrf
        
        @foreach($survey->questions->sortBy('order') as $question)
        <div class="form-group">
            <label>{{ $question->order }}. {{ $question->question_text }}</label>
            <textarea name="answers[{{ $question->id }}]" rows="3" required></textarea>
        </div>
        @endforeach
        
        <div style="display: flex; gap: 10px; margin-top: 20px;">
            <button type="submit" class="btn btn-primary">Enviar Respuestas</button>
            <a href="{{ route('encuestas.index') }}" class="btn" style="text-decoration: none;">Cancelar</a>
        </div>
    </form>
</div>
@endsection
