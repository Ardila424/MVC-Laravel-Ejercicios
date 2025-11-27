<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    public function index()
    {
        $reservas = Reserva::orderBy('date', 'asc')->orderBy('time', 'asc')->get();
        return view('reservas.index', compact('reservas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'service' => 'required|string'
        ]);
        
        Reserva::create($request->all());
        
        return redirect()->route('reservas.index');
    }

    public function destroy($id)
    {
        Reserva::findOrFail($id)->delete();
        return redirect()->route('reservas.index');
    }
}
