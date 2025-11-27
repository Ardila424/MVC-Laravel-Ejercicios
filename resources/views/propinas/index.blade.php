@extends('layouts.app')

@section('title', 'Calculadora de Propinas')

@section('content')
<div class="card">
    <h1>Calculadora de Propinas</h1>
    <p>Cálculo rápido de porcentajes</p>
    
    <form method="POST" action="{{ route('propinas.calcular') }}">
        @csrf
        <div class="form-group">
            <label>Monto de la cuenta</label>
            <input type="number" name="amount" step="0.01" required value="{{ old('amount', $result['amount'] ?? '') }}">
        </div>
        
        <div class="form-group">
            <label>Porcentaje de propina</label>
            <select name="percentage" required>
                <option value="10" {{ old('percentage', $result['percentage'] ?? '') == 10 ? 'selected' : '' }}>10%</option>
                <option value="15" {{ old('percentage', $result['percentage'] ?? '') == 15 ? 'selected' : '' }}>15%</option>
                <option value="20" {{ old('percentage', $result['percentage'] ?? '') == 20 ? 'selected' : '' }}>20%</option>
                <option value="25" {{ old('percentage', $result['percentage'] ?? '') == 25 ? 'selected' : '' }}>25%</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Calcular</button>
    </form>
    
    @if($result)
        <div class="result-box" style="margin-top: 30px;">
            <h3>Resultado</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px; margin-top: 15px;">
                <div>
                    <strong>Monto original:</strong><br>
                    ${{ number_format($result['amount'], 2) }}
                </div>
                <div>
                    <strong>Propina ({{ $result['percentage'] }}%):</strong><br>
                    ${{ number_format($result['tip'], 2) }}
                </div>
                <div style="grid-column: 1 / -1;">
                    <strong style="font-size: 1.2em;">Total a pagar:</strong><br>
                    <span style="font-size: 1.5em;">${{ number_format($result['total'], 2) }}</span>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
