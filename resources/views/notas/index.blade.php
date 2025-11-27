@extends('layouts.app')

@section('title', 'Gestor de Notas')

@section('content')
<div class="card">
    <h1>Gestor de Notas</h1>
    <p>Organiza tus ideas y apuntes</p>
    
    <div style="margin-bottom: 30px;">
        <a href="{{ route('notas.create') }}" class="btn btn-primary">+ Nueva Nota</a>
    </div>
    
    @if($notas->isEmpty())
        <div class="alert alert-info">
            No hay notas registradas.
        </div>
    @else
        <h3 style="margin-bottom: 15px;">Mis Notas</h3>
        <div class="grid">
            @foreach($notas as $nota)
            <div class="grid-item">
                <h4 style="margin-bottom: 10px; text-transform: uppercase;">{{ $nota->title }}</h4>
                <p style="margin: 10px 0; color: #666; font-size: 12px;">
                    <strong>Categoría:</strong> {{ $nota->category }}
                </p>
                <p style="margin: 10px 0; line-height: 1.6;">
                    {{ \Illuminate\Support\Str::limit($nota->content, 150) }}
                </p>
                <div style="margin-top: 15px; display: flex; gap: 10px;">
                    <a href="{{ route('notas.edit', $nota->id) }}" class="btn btn-sm" style="text-decoration: none;">Editar</a>
                    <form method="POST" action="{{ route('notas.destroy', $nota->id) }}" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
