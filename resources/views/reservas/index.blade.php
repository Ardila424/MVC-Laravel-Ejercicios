@extends('layouts.app')

@section('title', 'Sistema de Reservas')

@section('content')
<div class="card">
    <h1>Sistema de Reservas</h1>
    <p>Gestión de citas y reservas</p>
    
    <form method="POST" action="{{ route('reservas.store') }}" style="margin-bottom: 30px;">
        @csrf
        <h3 style="margin-bottom: 15px;">Nueva Reserva</h3>
        
        <div class="form-group">
            <label>Nombre Completo</label>
            <input type="text" name="name" required>
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
            <label>Servicio</label>
            <select name="service" required>
                <option value="">Seleccione un servicio</option>
                <option value="Consulta General">Consulta General</option>
                <option value="Peluquería">Peluquería</option>
                <option value="Masajes">Masajes</option>
                <option value="Asesoría">Asesoría</option>
                <option value="Otro">Otro</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Crear Reserva</button>
    </form>
    
    @if($reservas->isEmpty())
        <div class="alert alert-info">
            No hay reservas registradas.
        </div>
    @else
        <h3 style="margin-bottom: 15px;">Próximas Reservas</h3>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Nombre</th>
                    <th>Servicio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservas as $reserva)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($reserva->date)->format('d/m/Y') }}</td>
                    <td>{{ \Carbon\Carbon::parse($reserva->time)->format('H:i') }}</td>
                    <td>{{ $reserva->name }}</td>
                    <td>{{ $reserva->service }}</td>
                    <td>
                        <form method="POST" action="{{ route('reservas.destroy', $reserva->id) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Cancelar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
