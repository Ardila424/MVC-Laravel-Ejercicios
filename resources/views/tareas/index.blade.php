@extends('layouts.app')

@section('title', 'Lista de Tareas')

@section('content')
<div class="card">
    <h1>Lista de Tareas</h1>
    <p>Gestión simple de pendientes</p>
    
    <form method="POST" action="{{ route('tareas.store') }}" style="margin-bottom: 30px;">
        @csrf
        <h3 style="margin-bottom: 15px;">Nueva Tarea</h3>
        <div style="display: flex; gap: 10px;">
            <input type="text" name="title" placeholder="Título de la tarea" required style="flex: 1; padding: 10px; border: 2px solid #000; font-family: 'Courier New', monospace; font-size: 14px;">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>
    
    @if($todos->isEmpty())
        <div class="alert alert-info">
            No hay tareas registradas.
        </div>
    @else
        <h3 style="margin-bottom: 15px;">Mis Tareas</h3>
        <table>
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Título</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($todos as $todo)
                <tr>
                    <td>
                        <form method="POST" action="{{ route('tareas.toggle', $todo->id) }}" style="display: inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn {{ $todo->completed ? 'btn-success' : 'btn-secondary' }} btn-sm">
                                {{ $todo->completed ? 'Completada' : 'Pendiente' }}
                            </button>
                        </form>
                    </td>
                    <td style="{{ $todo->completed ? 'text-decoration: line-through; opacity: 0.6;' : '' }}">
                        {{ $todo->title }}
                    </td>
                    <td>
                        <form method="POST" action="{{ route('tareas.destroy', $todo->id) }}" style="display: inline;">
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
