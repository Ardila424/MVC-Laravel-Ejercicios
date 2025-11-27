@extends('layouts.app')

@section('title', $nota ? 'Editar Nota' : 'Nueva Nota')

@section('content')
<div class="card">
    <h1>{{ $nota ? 'Editar Nota' : 'Nueva Nota' }}</h1>
    <p>{{ $nota ? 'Modifica tu nota' : 'Crea una nueva nota' }}</p>
    
    <form method="POST" action="{{ $nota ? route('notas.update', $nota->id) : route('notas.store') }}">
        @csrf
        @if($nota)
            @method('PUT')
        @endif
        
        <div class="form-group">
            <label>Título</label>
            <input type="text" name="title" value="{{ $nota->title ?? old('title') }}" required>
        </div>
        
        <div class="form-group">
            <label>Categoría</label>
            <input type="text" name="category" value="{{ $nota->category ?? old('category', 'General') }}" placeholder="Ej: Personal, Trabajo, Ideas...">
        </div>
        
        <div class="form-group">
            <label>Contenido</label>
            <textarea name="content" rows="10" required>{{ $nota->content ?? old('content') }}</textarea>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn btn-primary">{{ $nota ? 'Actualizar' : 'Guardar' }}</button>
            <a href="{{ route('notas.index') }}" class="btn" style="text-decoration: none;">Cancelar</a>
        </div>
    </form>
</div>
@endsection
