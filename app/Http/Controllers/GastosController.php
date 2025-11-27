<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastosController extends Controller
{
    public function index()
    {
        $gastos = Gasto::orderBy('date', 'desc')->get();
        
        // Calcular total y resumen por categoría
        $total = $gastos->sum('amount');
        $porCategoria = $gastos->groupBy('category')->map(function ($items) {
            return $items->sum('amount');
        });
        
        return view('gastos.index', compact('gastos', 'total', 'porCategoria'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'category' => 'required|string',
            'date' => 'required|date'
        ]);
        
        Gasto::create($request->all());
        
        return redirect()->route('gastos.index');
    }

    public function destroy($id)
    {
        Gasto::findOrFail($id)->delete();
        return redirect()->route('gastos.index');
    }
}
