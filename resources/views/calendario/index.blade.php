@extends('layouts.app')

@section('title', 'Calendario de Eventos')

@section('content')
<div class="card">
    <h1>Calendario de Eventos</h1>
    <p>Próximos 10 eventos ordenados por fecha</p>
    
    <form method="POST" action="{{ route('calendario.store') }}" style="margin-bottom: 30px;">
        @csrf
        <h3 style="margin-bottom: 15px;">Agregar Nuevo Evento</h3>
        
        <div class="form-group">
            <label>Título del Evento</label>
            <input type="text" name="title" required>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="form-group">
                <label>Fecha</label>
                <input type="date" name="date" required>
            </div>
            
            <div class="form-group">
                <label>Hora</label>
                <input type="time" name="time" required>
            </div>
        </div>
        
        <div class="form-group">
            <label>Descripción (Opcional)</label>
            <textarea name="description" rows="3"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Agregar Evento</button>
    </form>
    
    @if($eventos->isEmpty())
        <div class="alert alert-info">
            No hay eventos programados.
        </div>
    @else
        <h3 style="margin-bottom: 15px;">Próximos Eventos</h3>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($evento->date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($evento->time)->format('H:i') }}</td>
                    <td><strong>{{ $evento->title }}</strong></td>
                    <td>{{ $evento->description ?? '-' }}</td>
                    <td>
                        <form method="POST" action="{{ route('calendario.destroy', $evento->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
