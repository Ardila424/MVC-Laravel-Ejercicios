@extends('layouts.app')

@section('title', 'Gestor de Gastos')

@section('content')
<div class="card">
    <h1>Gestor de Gastos</h1>
    <p>Control de gastos personales en COP</p>
    
    <form method="POST" action="{{ route('gastos.store') }}" style="margin-bottom: 30px;">
        @csrf
        <h3 style="margin-bottom: 15px;">Agregar Nuevo Gasto</h3>
        
        <div class="form-group">
            <label>Descripción</label>
            <input type="text" name="description" required>
        </div>
        
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
            <div class="form-group">
                <label>Monto (COP)</label>
                <input type="number" name="amount" step="0.01" required>
            </div>
            
            <div class="form-group">
                <label>Fecha</label>
                <input type="date" name="date" required>
            </div>
        </div>
        
        <div class="form-group">
            <label>Categoría</label>
            <select name="category" required>
                <option value="">Seleccione una categoría</option>
                <option value="Alimentación">Alimentación</option>
                <option value="Transporte">Transporte</option>
                <option value="Servicios">Servicios</option>
                <option value="Entretenimiento">Entretenimiento</option>
                <option value="Salud">Salud</option>
                <option value="Otros">Otros</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Agregar Gasto</button>
    </form>
    
    @if($gastos->isEmpty())
        <div class="alert alert-info">
            No hay gastos registrados.
        </div>
    @else
        <!-- Resumen -->
        <div class="result-box" style="margin-bottom: 30px;">
            <h3>Resumen</h3>
            <div style="margin-top: 15px;">
                <p><strong>Total General:</strong> {{ number_format($total, 0, ',', '.') }} COP</p>
                
                @if($porCategoria->count() > 0)
                    <h4 style="margin-top: 15px; border-bottom: 2px solid #000; padding-bottom: 5px;">Por Categoría</h4>
                    <ul style="list-style: none; line-height: 2;">
                        @foreach($porCategoria as $categoria => $monto)
                            <li>→ <strong>{{ $categoria }}:</strong> {{ number_format($monto, 0, ',', '.') }} COP</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        
        <!-- Lista de gastos -->
        <h3 style="margin-bottom: 15px;">Historial de Gastos</h3>
        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Monto (COP)</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($gastos as $gasto)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($gasto->date)->format('d/m/Y') }}</td>
                    <td>{{ $gasto->description }}</td>
                    <td>{{ $gasto->category }}</td>
                    <td style="text-align: right; font-weight: bold;">{{ number_format($gasto->amount, 0, ',', '.') }}</td>
                    <td>
                        <form method="POST" action="{{ route('gastos.destroy', $gasto->id) }}" style="display: inline;">
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
