@extends('layouts.app')

@section('title', 'Resultados de Encuesta')

@section('content')
<div class="card">
    <h1>{{ $survey->title }}</h1>
    <p>Resultados de la encuesta ({{ $survey->responses->count() }} respuestas)</p>
    
    <a href="{{ route('encuestas.index') }}" class="btn" style="margin-bottom: 20px; text-decoration: none;">← Volver</a>
    
    @if($survey->responses->isEmpty())
        <div class="alert alert-info">
            Esta encuesta aún no tiene respuestas.
        </div>
    @else
        @foreach($survey->questions->sortBy('order') as $question)
        <div class="result-box" style="margin-bottom: 20px;">
            <h3>{{ $question->order }}. {{ $question->question_text }}</h3>
            
            @php
                $respuestas = $question->answers;
            @endphp
            
            @if($respuestas->count() > 0)
                <ul style="list-style: none; margin-top: 15px; line-height: 2;">
                    @foreach($respuestas as $respuesta)
                        <li style="padding: 10px; border-bottom: 1px solid #000;">
                            → {{ $respuesta->answer_text }}
                        </li>
                    @endforeach
                </ul>
            @else
                <p style="margin-top: 10px; color: #666;">Sin respuestas para esta pregunta</p>
            @endif
        </div>
        @endforeach
    @endif
</div>
@endsection
